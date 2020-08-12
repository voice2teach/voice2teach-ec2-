(
    function(configFile) {
        BASE_URL = $("#base_url").val();
        BASE_ASSET = $("#base_asset").val();
        //default values to be used if config file isn't provided or wasn't read for some reason
        const defaults = {
            listenAtStart: false,
            prodMode: false,
            namesColumnIndex: 0,
            gradesColumnIndex: 1,
            rowNumberWhereNameStarts: 2,
            matchThreshold: 0.8,
            cutoffThreshold: 0.5,
            lowestMark: 0,
            highestMark: 100,
            nameOfTheFileToDownload: 'Grades'
        }

        //some HTML elements IDs
        const actionBarId = 'actionbar';
        const fileInputId = 'file_input';
        const nfsMsgId = 'noFileSelected';
        const tableContainerId = 'tableContainer';
        const tableId = 'marksTable';
        const recordButton = 'record_button';

        //All variables (global) declarations below
        let namesColumnIndex;
        let gradesColumnIndex;
        let totalStudentCount = 0;
        let tableRendered = false;
        let tabularFileData = [];
        let probableIndices = [];
        let studentsNameFuzzySet;
        let studentsFuzzyNameFuzzySet;
        let studentNamesIndexPair = {};
        let studentFuzzyNamesIndexPair = {};
        let lastAddedRow;
        let fileInput;
        let config = {};
        let final_transcript = '';
        let selectedfuzzy = '';
        let recognizing = false;
        let noResultFound = false;
        let recognition;
        let recognition_fuzzy;
        let ignore_onend;
        let start_timestamp;
        let first_char = /\S/;
        let current_style;
        let similarNamesCount = 0;
        let lastrecord = '';
        let lastrecordadd = '';
        let pairedResult = {
            name: '',
            marks: undefined
        }


        //read the config file and add it to application configuration
        function loadConfigurations() {
            fetch(configFile)
                .then(response => response.json())
                .then(json => {
                    config = json;
                    logThis('configuration loaded is', config);
                    initialize();
                })
                .catch(err => {
                    logThis('Please verify if the config file is there.', 'Using defaults.');
                    config = defaults;
                    initialize();
                })
        }


        // conditionally add "start listening" button and initialise the application
        function initialize() {
            //check if the browser supports webkitSpeechRecognition
            if (!('webkitSpeechRecognition' in window)) {
                upgrade();
            } else {
                console.log('config loaded is:', config);
                initSpeechRecognition();

                //add listener to file selected/change event
                // fileInput = document.getElementById(fileInputId);
                file_input.addEventListener('change', fileChangedSelectedEvent);
                close_conflict_window.addEventListener('click', closeConflictWindow);
                download_button.addEventListener('click', generateCSV);

                // Confirm from user his/her intent if he/she reloads or navigate away from the page
                window.addEventListener("beforeunload", function(e) {
                    $(".savebtn").click();
                    // if (tableRendered) {
                    //     var confirmationMessage = 'It looks like you have been editing something. ' +
                    //         'If you leave now, your changes will be lost.';
                    //     (e || window.event).returnValue = confirmationMessage;
                    //     return confirmationMessage;
                    // }
                });
                namesColumnIndex = config.namesColumnIndex;
                gradesColumnIndex = config.gradesColumnIndex;

                //show starting info
                showInfo('info_start');

                //if config says do not listen at start then add a button to listen
                if (!config.listenAtStart) {
                    addButtonToActivateSpeechRecognition();
                }
            }
            var fuzzydata = $('.Fuzzy_Name').map(function() {
                return $(this).text();
            }).get();
            generateFuzzyData(fuzzydata);
        }


        //initialize speech recognition and events
        function initSpeechRecognition() {
            recognition = new webkitSpeechRecognition();
            recognition_fuzzy = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition_fuzzy.continuous = true;
            recognition.interimResults = true;
            recognition_fuzzy.interimResults = true;

            //recognition start event
            recognition.onstart = function() {
                recognizing = true;
                showInfo('info_speak_now');
                start_img.src = 'assets/img/mic-animate.gif';
                record_button.setAttribute('class', 'recording StandardFont');
                record_button.innerHTML = 'Stop Listening';
            };
            recognition_fuzzy.onstart = function() {
                recognizing = true;
            };

            //recognition error event
            recognition.onerror = function(event) {
                if (event.error == 'no-speech') {
                    ignore_onend = true;
                }

                if (event.error == 'audio-capture') {
                    ignore_onend = true;
                }

                if (event.error == 'not-allowed') {
                    ignore_onend = true;
                }

            };
            recognition_fuzzy.onerror = function(event) {
                if (event.error == 'no-speech') {
                    ignore_onend = true;
                }

                if (event.error == 'audio-capture') {
                    ignore_onend = true;
                }

                if (event.error == 'not-allowed') {
                    ignore_onend = true;
                }

            };

            //recognition end event
            recognition.onend = function() {
                if (ignore_onend) {
                    return;
                }

                if (noResultFound) {
                    noResultFound = false;
                    recognition.start();
                    return;
                }

                start_img.src = 'assets/img/mic.gif';
                if (!final_transcript) {
                    showInfo('info_start');
                    return;
                }

                showInfo('info_start');
                recognizing = false;
                record_button.setAttribute('class', 'StandardFont');
                record_button.innerHTML = 'Start Listening';
            };
            recognition_fuzzy.onend = function() {
                if (ignore_onend) {
                    return;
                }

                if (noResultFound) {
                    noResultFound = false;
                    recognition_fuzzy.start();
                    return;
                }

                if (!final_transcript) {
                    return;
                }

                recognizing = false;
            };

            //recognition results received event
            recognition.onresult = function(event) {
                var interim_transcript = '';
                var finalResult = '';
                var lastdata = '';

                // for (var i = event.resultIndex; i < event.results.length; ++i) {
                let resultText = event.results[event.results.length - 1][0].transcript;
                lastrecord = resultText;
                const lastArray = lastrecordadd.split(' ').pop();
                console.log(lastArray, lastrecordadd);
                // const lastArray1 = lastrecordadd.split(' ').pop();console.log(lastArray1);
                // if(isNaN(lastArray)==true){
                //     lastArray = lastArray1 + ' ' + lastArray;
                // }
                if (isNaN(lastArray) == true) {
                    resultText = lastArray + ' ' + resultText;
                } else {
                    resultText = resultText;
                }
                console.log("resultText: ", resultText);
                const resultArray = resultText.split(' ');
                console.log(resultArray);
                lastdata = resultArray[resultArray.length - 1];
                if (isNaN(lastdata) == false && resultArray.length >= 2) {
                    if (resultArray.length == 2) {
                        finalResult = resultArray.slice(resultArray.length - 2, resultArray.length);
                    } else {
                        if (isNaN(resultArray[resultArray.length - 3]) == false) {
                            finalResult = resultArray.slice(resultArray.length - 2, resultArray.length);
                        } else {
                            finalResult = resultArray.slice(resultArray.length - 3, resultArray.length);
                        }
                    }
                    resultReceived(finalResult);
                    lastdata = '';
                }
                // if (event.results[i].isFinal) {
                //     finalResult = event.results[i][0].transcript;
                //     final_transcript += finalResult;
                //     resultReceived(finalResult);
                //     console.log("final_transcript", finalResult);
                // } else {
                //     interim_transcript += event.results[i][0].transcript;
                // }
                // console.log(event.results[i][0].transcript);
                // interim_transcript += event.results[i][0].transcript;
                // console.log("event.resultIndex : ", event.resultIndex);
                // console.log("for : ", i, interim_transcript);
                // const resultArray = interim_transcript.split(' ');
                // lastdata = resultArray.pop();
                // // if(resultArray.length > 3){
                // //     interim_transcript = '';
                // //     finalResult = '';
                // //     console.log('deleted');
                // // }
                // // console.log('first data is ',interim_transcript);
                // // console.log(resultArray);
                // // console.log(resultArray.length);
                // // console.log('check=',isNaN(event.results[i][0].transcript));
                // // console.log(lastdata);
                // if (isNaN(lastdata)==false
                //     // isNaN(event.results[i][0].transcript)==false
                //     ){
                //     var finalResult = interim_transcript;
                //     interim_transcript = '';
                //     // console.log(finalResult);
                //     resultReceived(finalResult);
                //     finalResult = '';
                // }
                // }

                final_transcript = capitalize(final_transcript);

                if (final_transcript || interim_transcript) {
                    showButtons('inline-block');
                }
                lastrecordadd += lastrecord;
            };
            recognition_fuzzy.onresult = function(event) {
                var interim_transcript = '';
                var finalResult = '';
                var lastdata = '';

                for (var i = event.resultIndex; i < event.results.length; ++i) {
                    finalResult += event.results[i][0].transcript;
                    console.log(finalResult);
                    $(".record-fuzzy-name").val(finalResult);
                }

                final_transcript = capitalize(final_transcript);

                if (final_transcript || interim_transcript) {
                    showButtons('inline-block');
                }
            };
        }

        // start/stop speech recognition
        function startStopListening() {
            //if table is not rendered, recognition will not start
            if (!tableRendered) {
                alert("Application couldn't find the Students marks table. Import a file!");
            }
            //start listening or stop listening if already listening
            else {
                //already listening therefore stop it
                if (recognizing) {
                    recognition.stop();
                    showInfo('info_start');
                    recognizing = false;
                    record_button.setAttribute('class', 'StandardFont');
                    record_button.innerHTML = 'Start Listening';
                    return;
                }

                //start listening
                final_transcript = '';
                recognition.lang = 'en-US';
                recognition.start();
                ignore_onend = false;
                start_img.src = 'assets/img/mic-slash.gif';
                showInfo('info_allow');
                showButtons('none');
                start_timestamp = (new Date()).timeStamp;
            }
        }


        //receives only final results from the speech recognition
        function resultReceived(result) {
            // console.log('para = ', result);
            // const resultArray = result.split(' ');
            let gradeString;
            // console.log('result array', resultArray);
            resultArray = result;
            //check if the array has atleast 2 strings
            if (resultArray.length == 2) {
                pairedResult.name = resultArray[0];
                gradeString = resultArray[1];

            }
            /* 
            check if the result has more than 2 strings
            add all strings together in a name string
            except for the last one expected to be marks
            */
            else if (resultArray.length > 2) {
                gradeString = resultArray.pop();
                pairedResult.name = resultArray.join(' ');

                if (pairedResult.name[0] == ' ') {
                    pairedResult.name = pairedResult.name.replace(' ', '');
                }
                if (pairedResult.name[pairedResult.name.length - 1] == ' ') {
                    pairedResult.name = pairedResult.name.slice(0, pairedResult.name.length - 1);
                }
            }

            //block to check and parse marks
            if (gradeString) {
                if (typeof parseInt(gradeString) == 'number') {
                    pairedResult.marks = parseInt(gradeString);
                } else if (typeof gradeString == 'string') {
                    if (gradeString.toLowerCase() == 'zero') {
                        pairedResult.marks = 0;
                    } else if (gradeString.toLowerCase() == 'one') {
                        pairedResult.marks = 1;
                    } else if (gradeString.toLowerCase() == 'xx') {
                        pairedResult.marks = 20;
                    } else if (gradeString.toLowerCase() == 'hundred') {
                        pairedResult.marks = 100;
                    }
                }
            }

            //if a pair is ready of name and marks then try matching them with student names
            if (pairedResult.name && pairedResult.marks) {
                if (pairedResult.marks >= 0 && pairedResult.marks <= 100) {
                    matchStudentName();
                } else {
                    alert("Marks should be in the range of 0 to 100!");
                }
            }
        }


        // match speech recognition result with student names data
        function matchStudentName() {
            //get matching results along with their match score
            let matchResult = studentsNameFuzzySet.get(pairedResult.name);
            let matchResult2 = studentsFuzzyNameFuzzySet.get(pairedResult.name);
            let key;

            console.log('matchResult:', matchResult, 'matchResult2:', matchResult2);
            console.log('pair:', pairedResult, 'match result:', matchResult);
            if (matchResult2 != null) {
                if (matchResult2[0][0] >= config.matchThreshold) {
                    key = matchResult2[0][1];
                    console.log(key, studentFuzzyNamesIndexPair[key], pairedResult.marks);
                    addMarksToTable(studentFuzzyNamesIndexPair[key], pairedResult.marks);
                }
            }

            //check if there are result(s) in the matchResult
            else if (matchResult && matchResult.length) {
                //pause/stop the recognition for sometime
                // startStopListening();

                //if there is only 1 match with score more than a matching threshold then add it to the table
                if (matchResult.length == 1 && matchResult[0][0] >= config.matchThreshold) {
                    key = matchResult[0][1];
                    addMarksToTable(studentNamesIndexPair[key], pairedResult.marks);
                }
                // look further in to the matchResult to filter out results
                else {
                    let exactMatchesFound = [];
                    let matchesAboveMatchThreshold = [];

                    //iterate through results and find probable and other matches
                    for (let i = 0; i < matchResult.length; i++) {
                        if (matchResult[i][0] == 1) {
                            exactMatchesFound.push(matchResult[i]);
                        }
                        if (matchResult[i][0] >= config.matchThreshold) {
                            matchesAboveMatchThreshold.push(matchResult[i]);
                        }
                        key = matchResult[i][1];
                        if (matchResult[i][0] >= config.cutoffThreshold) {
                            probableIndices.push(key)
                        }
                    }

                    //check if there is a single result with exact match
                    if (exactMatchesFound.length == 1) {
                        addMarksToTable(studentNamesIndexPair[exactMatchesFound[0][1]], pairedResult.marks);
                    }
                    //check if there is a single result with score greater than match threshold
                    else if (matchesAboveMatchThreshold.length == 1) {
                        addMarksToTable(studentNamesIndexPair[matchesAboveMatchThreshold[0][1]], pairedResult.marks);
                    }
                    //add results above cutoff threshold to conflict window
                    else {
                        probableIndices = getUnique(probableIndices);
                        if (probableIndices.length) {
                            // showConflictWindow();
                        }
                        //show no results found message if there are no probable indices
                        else {
                            noResultFound = true;
                            showInfo('no_result_found');
                        }
                    }
                }
            }
        }


        //adds marks against a student name
        function addMarksToTable(pos, marks) {
            if (lastAddedRow) {
                lastAddedRow.removeAttribute('class');
            }
            lastAddedRow = document.getElementById('SG_ROW_' + pos);
            lastAddedRow.setAttribute('class', 'matchedRow');
            const gradeCell = document.getElementById('G_CELL_' + pos);
            gradeCell.setAttribute('value', marks);

            tabularFileData[pos][gradesColumnIndex] = marks;
            console.log('tabular data row', tabularFileData[pos]);

            pairedResult = {};
            choices_container.innerHTML = '';
            probableIndices = [];
            //start listening again after the results have been added
            // setTimeout(() => {
            //     startStopListening();
            // }, 1500);
            conflict_window.style.display = 'none';
            lastAddedRow.scrollIntoView();
        }


        // display a window to the user to make the right selection in case of conflicts
        function showConflictWindow() {
            $('#choices_container').empty();
            conflict_window.style.display = 'block';
            for (let i = 0; i < probableIndices.length; i++) {
                const pos = studentNamesIndexPair[probableIndices[i]];
                const studentName = tabularFileData[pos][namesColumnIndex];
                const spanElement = document.createElement('span');
                const textNode = document.createTextNode(studentName);
                console.log(studentName);
                spanElement.appendChild(textNode);

                //add click listener to the probable name bubbles, so that they can be clicked/selected
                spanElement.addEventListener('click', function() {
                    addMarksToTable(pos, pairedResult.marks);
                    closeConflictWindow();
                });

                choices_container.appendChild(spanElement);
            }
        }


        // hides conflict window
        function closeConflictWindow() {
            conflict_window.style.display = 'none';
            choices_container.innerHTML = '';
            probableIndices = [];
        }


        // adds a button to start listening
        function addButtonToActivateSpeechRecognition() {
            const actionBar = document.getElementById(actionBarId);
            let startListeningButton = document.createElement('button');
            startListeningButton.setAttribute('id', recordButton);
            startListeningButton.setAttribute('class', 'StandardFont');
            startListeningButton.addEventListener('click', startStopListening);
            startListeningButton.innerHTML = 'Start Listening';
            actionBar.appendChild(startListeningButton);
        }


        //generates data for table 
        function generateTableData(dataFromFile) {
            // console.log('data from file', dataFromFile);
            const linesArray = dataFromFile.split('\n');
            for (i = 0; i < 1; i++) {
                if (linesArray[i].match("name")) {
                    linesArray.unshift("");
                } else if (linesArray[i].match("Name")) {
                    linesArray.unshift("");
                } else {
                    linesArray.unshift("", "");
                }
            }
            // linesArray.unshift("", "");

            //if a table was already renderred then genrate the CSV data from it and download it to save data
            if (tableRendered) {
                generateCSV();

                //remove all the rows, needed if a file is selected over already existing file
                for (let i = config.rowNumberWhereNameStarts; i < (totalStudentCount + config.rowNumberWhereNameStarts); i++) {
                    const row = document.getElementById('SG_ROW_' + i);
                    if (row) {
                        console.log('row removed', row);
                        row.remove();
                    }
                }
                tabularFileData = [];
                totalStudentCount = 0;
                tableRendered = false;
            }
            //recursively add data to a tabular format in tabularFileData variable
            for (let i = 0; i < linesArray.length; i++) {
                //check for blank lines
                if (linesArray[i]) {
                    let line = linesArray[i].split(',');
                    //format names from csv file
                    if (i >= config.rowNumberWhereNameStarts) {
                        let last_name = line.shift();
                        let first_name = line[0];

                        last_name = last_name.replace('"', '');
                        first_name = first_name.replace('"', '');

                        if (first_name[0] == ' ') {
                            first_name = first_name.slice(1, first_name.length);
                        }

                        line[0] = last_name + ', ' + first_name;
                        //add last name in to the student name and index pair object
                        addNameToStudentNamesIndexPair(last_name, i);

                        const first_name_array = first_name.split(' ');

                        //add first name and middle name in to the student name and index pair object
                        first_name_array.forEach(name_string => {
                            addNameToStudentNamesIndexPair(name_string, i);
                        });
                    }

                    tabularFileData[i] = line;
                }
            }

            //initialise fuzzyset with all the names (first, middle and last)
            let names_set = Object.keys(studentNamesIndexPair);
            console.log("<<<< names_set >>>>>", names_set);
            studentsNameFuzzySet = FuzzySet(names_set);
            //add the generated names list to the table
            addRowsToTable();
        }

        function generateFuzzyData(dataFromFile) {
            const linesArray = dataFromFile;
            linesArray.unshift("", "");
            //recursively add data to a tabular format in tabularFileData variable
            for (let i = 0; i < linesArray.length; i++) {
                //check for blank lines
                if (linesArray[i]) {
                    // let line = linesArray[i].split(',');
                    //format names from csv file
                    if (i >= config.rowNumberWhereNameStarts) {
                        // let last_name = line.shift();
                        let first_name = linesArray[i];

                        // // last_name = last_name.replace('"', '');
                        // // first_name = first_name.replace('"', '');

                        if (first_name[0] == ' ') {
                            first_name = first_name.slice(1, first_name.length);
                        }

                        // line[0] = last_name + ', ' + first_name;
                        // console.log(line);
                        // //add last name in to the student name and index pair object
                        // addNameToStudentFuzzyNamesIndexPair(last_name, i);

                        const first_name_array = first_name.split();

                        //add first name and middle name in to the student name and index pair object
                        first_name_array.forEach(name_string => {
                            addNameToStudentFuzzyNamesIndexPair(name_string, i);
                        });
                    }
                }
            }
            //initialise fuzzyset with all the names (first, middle and last)
            // fuzzy_names_set = '';
            let fuzzy_names_set = Object.keys(studentFuzzyNamesIndexPair);
            console.log("<<<< names_set >>>>>", fuzzy_names_set);
            studentsFuzzyNameFuzzySet = {};
            studentsFuzzyNameFuzzySet = FuzzySet(fuzzy_names_set);
            //add the generated names list to the table
            // addRowsToTable();
        }


        //function to add student name to student name and index pair object
        function addNameToStudentNamesIndexPair(name, index) {
            //if student name is already not there
            if (!studentNamesIndexPair[name]) {
                studentNamesIndexPair[name] = index;
            }
            //if a similar name already exists, ie. name exists in student and index pair object already
            else {
                const indexFromExistingName = studentNamesIndexPair[name];
                var nameToAdd = "";

                //delete already existing name and index pair from student name and index pair object
                delete studentNamesIndexPair[name];

                //add the name (which was deleted above) suffixed with a distingusihing number (count of similar names)
                nameToAdd = name + ++similarNamesCount;
                studentNamesIndexPair[nameToAdd] = indexFromExistingName;

                //now add the other similar name with a distinguishing number as suffix
                nameToAdd = name + ++similarNamesCount;
                studentNamesIndexPair[nameToAdd] = index;
            }
        }

        function addNameToStudentFuzzyNamesIndexPair(name, index) {
            //if student name is already not there
            if (!studentFuzzyNamesIndexPair[name]) {
                studentFuzzyNamesIndexPair[name] = index;
            }
            //if a similar name already exists, ie. name exists in student and index pair object already
            else {
                const indexFromExistingName = studentFuzzyNamesIndexPair[name];
                var nameToAdd = "";

                //delete already existing name and index pair from student name and index pair object
                delete studentFuzzyNamesIndexPair[name];

                //add the name (which was deleted above) suffixed with a distingusihing number (count of similar names)
                nameToAdd = name + ++similarNamesCount;
                studentFuzzyNamesIndexPair[nameToAdd] = indexFromExistingName;

                //now add the other similar name with a distinguishing number as suffix
                nameToAdd = name + ++similarNamesCount;
                studentFuzzyNamesIndexPair[nameToAdd] = index;
            }
        }


        //function to display student names in the table format with edittable marks cell
        function addRowsToTable() {
            $("header").css("opacity", "0.3");
            $("#loading_screen").css("display", "block");
            const table = document.getElementById(tableId);
            for (let i = 2; i < tabularFileData.length; i++) {
                console.log(tabularFileData);
                const student_name = tabularFileData[i][namesColumnIndex];
                const student_grade = tabularFileData[i][gradesColumnIndex] || '';

                const table_row = document.createElement('tr');
                const number_data = document.createElement('td');
                const name_data = document.createElement('td');
                const fuzzy_name_data = document.createElement('td');
                const grade_data = document.createElement('td');
                const input_box = document.createElement('input');
                const name_node = document.createTextNode(student_name);
                const fuzzy_name_node = document.createTextNode('');
                const number_node = document.createTextNode(i - 1);

                number_data.appendChild(number_node);

                name_data.appendChild(name_node);
                fuzzy_name_data.appendChild(fuzzy_name_node);

                input_box.setAttribute('class', 'editCell');
                input_box.setAttribute('value', student_grade);
                input_box.setAttribute('id', 'G_CELL_' + i);
                name_data.setAttribute('id', 'Fuzzy_' + i);
                fuzzy_name_data.setAttribute('id', 'CELL_Fuzzy_' + i);
                fuzzy_name_data.setAttribute('class', 'Fuzzy_Name');

                //add focus out event to marks input cell to listen for any value change
                input_box.addEventListener('focusout', function(event) {
                    let mark = event.target.value;
                    if (mark) {
                        mark = parseInt(mark);
                        if ((typeof mark == 'number') && (mark >= config.lowestMark && mark <= config.highestMark)) {
                            tabularFileData[i][gradesColumnIndex] = mark;
                        } else {
                            alert('Expecting a numerical value between ' + config.lowestMark + ' to ' +
                                config.highestMark + ' at Row: ' + (i - config.rowNumberWhereNameStarts + 1));
                            event.target.value = '';
                        }
                    }
                });
                name_data.addEventListener('click', function(event) {
                    selectedfuzzy = event.target.id;
                    var currentfuzzynameid = '#CELL_' + selectedfuzzy;
                    var currentfuzzyname = $(currentfuzzynameid).text();
                    recognition.stop();
                    showInfo('info_start');
                    recognizing = false;
                    record_button.setAttribute('class', 'StandardFont');
                    record_button.innerHTML = 'Start Listening';
                    $(".record-fuzzy-name").val(currentfuzzyname);
                    $(".mask").addClass("active");
                });

                grade_data.appendChild(input_box);
                grade_data.setAttribute('class', 'g_data');

                table_row.appendChild(number_data);
                table_row.appendChild(name_data);
                table_row.appendChild(fuzzy_name_data);
                table_row.appendChild(grade_data);
                table_row.setAttribute('id', 'SG_ROW_' + i);

                table.appendChild(table_row);
                totalStudentCount++;
            }
            hideNofileSelectedMessage();
            $('#file_input').css("display", "none");
            var TableData = new Array();

            $('#marksTable tr').each(function(row, tr) {
                TableData[row] = {
                    "S_No": $(tr).find('td:eq(0)').text(),
                    "Student_Name": $(tr).find('td:eq(1)').text(),
                    "Fuzzy_Name": $(tr).find('td:eq(2)').text(),
                    "Mark": $(tr).find('td:eq(3) input').val()
                }
            });
            TableData.shift();
            console.log(TableData);
            var filename = $('#file_input').prop("files")[0]['name'];
            $.ajax({
                url: BASE_URL + '/Tablemanagement/createtable',
                data: {
                    Tablename: filename,
                    Tabledata: TableData,
                },
                error: function(e) {
                    // $('#info').html('<p>An error has occurred</p>');
                },
                dataType: 'json',
                success: function(data) {
                    // setTimeout(function() {
                    //     n2.show('slow', {}, 500)
                    // }, 1000);
                    // setTimeout(function() {
                    //     n2.hide('blind', {}, 500)
                    // }, 4000);
                    console.log(data);
                    document.location.href = BASE_URL + '/Tablemanagement/loadtable?t_id=' + data;
                },
                type: 'POST'
            });
        }


        //finds unique values and returns the unique array
        function getUnique(sourceArray) {
            let uniqueArray = [];
            for (let i = 0; i < sourceArray.length; i++) {
                if (uniqueArray.indexOf(sourceArray[i]) < 0) {
                    uniqueArray.push(sourceArray[i]);
                }
            }
            return uniqueArray;
        }


        //event when a file is imported or another file is imported over an existing one
        function fileChangedSelectedEvent() {
            var fileToLoad = file_input.files[0];
            var fileReader = new FileReader();

            //load event for file
            fileReader.onload = function(fileLoadedEvent) {
                const dataFromFile = fileLoadedEvent.target.result;
                console.log(dataFromFile);
                file_input.setAttribute('class', 'FileSelected StandardFont');
                //pass file to generate table data
                generateTableData(dataFromFile);
            };

            if (fileToLoad) {
                fileReader.readAsText(fileToLoad, "UTF-8");
            }
        }


        //function to generate the CSV file
        function generateCSV() {
            if (tableRendered) {
                let csv_string = '';
                //recusrively create the CSV data
                for (let i = 0; i < tabularFileData.length; i++) {
                    for (let j = 0; j < tabularFileData[i].length; j++) {
                        if (i > 1 && j == 0) {
                            csv_string += '"' + tabularFileData[i][j] + '"';
                        } else {
                            csv_string += tabularFileData[i][j];
                        }
                        if (j < (tabularFileData[i].length - 1)) {
                            csv_string += ',';
                        }
                    }
                    csv_string += '\n';
                }
                //download the csv after the data has been generated
                downloadFile(csv_string);
            } else {
                alert('No file found!, please import a file first.');
            }
        }


        //function to download the CSV file
        function downloadFile(csvString) {
            var blob = new Blob([csvString]);
            if (window.navigator.msSaveOrOpenBlob) {
                window.navigator.msSaveBlob(blob, config.nameOfTheFileToDownload + ".csv");
            } else {
                var a = window.document.createElement("a");

                a.href = window.URL.createObjectURL(blob, {
                    type: "text/plain"
                });
                a.download = "Grades.csv";
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
            }
        }


        //hides no file is imported message from the screen
        function hideNofileSelectedMessage() {
            const nfsMsg = document.getElementById(nfsMsgId);
            const tableContainer = document.getElementById(tableContainerId);
            let height = nfsMsg.clientHeight;
            let width = nfsMsg.clientWidth;

            //custom animation to hide the message
            const animInterval = setInterval(() => {
                if (height <= 5 || width <= 5) {
                    nfsMsg.style.display = 'none';
                    tableContainer.style.display = 'block';
                    tableRendered = true;
                    clearInterval(animInterval);
                    if (config.listenAtStart) {
                        startListening();
                    }
                }
                height *= 0.9;
                width *= 0.9;

                nfsMsg.style.height = height + 'px';
                nfsMsg.style.width = width + 'px';
            }, 5);
        }


        //console.log wrapper. Set prodMode to be "true" in config to disable logging
        //not put in to use right now
        function logThis(...params) {
            // console.log(params)
            if (!config.prodMode) {
                let log = "";
                for (let i = 0; i < params.length; i++) {
                    // if (typeof params[i] != 'string') {
                    //     params[i] = (params[i]);
                    // }
                    log = params[i] + " ";
                }
                console.log(log);
            }
        }


        //show message to the user if the browser doesn't support speech recognition
        function upgrade() {
            start_button.style.visibility = 'hidden';
            showInfo('info_upgrade');
        }


        //capitalizes a string
        function capitalize(s) {
            return s.replace(first_char, function(m) { return m.toUpperCase(); });
        }


        //shows messages to the user
        function showInfo(s) {
            if (s) {
                for (var child = info.firstChild; child; child = child.nextSibling) {
                    if (child.style) {
                        child.style.display = child.id == s ? 'inline' : 'none';
                    }
                }
                info.style.visibility = 'visible';
            } else {
                info.style.visibility = 'hidden';
            }
        }


        //not being used right now
        function showButtons(style) {
            if (style == current_style) {
                return;
            }
            current_style = style;
        }
        $(".start-fuzzy-name-record").on("click", function() {
            var text = $(".start-fuzzy-name-record").text();
            var fuzzy_name = '';
            if (text == 'Start Recording') {
                $(".start-fuzzy-name-record").text('Stop Recording');
                $(".fuzzy-process").text('Recording...');
                $(".start-fuzzy-name-record").css('background-color', 'red');
                recognition_fuzzy.start();
            } else if (text == 'Stop Recording') {
                $(".start-fuzzy-name-record").text('Start Recording');
                $(".fuzzy-process").text('Please click Start button to record.');
                $(".start-fuzzy-name-record").css('background-color', 'green');
                recognition_fuzzy.stop();
                fuzzy_name = $(".record-fuzzy-name").val();
                if (fuzzy_name != '') {
                    $(".save-fuzzy-name-record").css('display', 'inline');
                } else {
                    $(".save-fuzzy-name-record").css('display', 'none');
                }
            }
        });
        $(".save-fuzzy-name-record").on("click", function() {
            var name = $(".record-fuzzy-name").val();
            selectedfuzzy = '#CELL_' + selectedfuzzy;
            $(selectedfuzzy).text(name);
            selectedfuzzy = '';
            closeModal();
            var fuzzydata = $('.Fuzzy_Name').map(function() {
                return $(this).text();
            }).get();
            generateFuzzyData(fuzzydata);
        });

        function closeModal() {
            $(".start-fuzzy-name-record").text('Start Recording');
            $(".fuzzy-process").text('Please click Start button to record.');
            $(".start-fuzzy-name-record").css('background-color', 'green');
            recognition_fuzzy.stop();
            fuzzy_name = $(".record-fuzzy-name").val();
            if (fuzzy_name != '') {
                $(".save-fuzzy-name-record").css('display', 'inline');
            } else {
                $(".save-fuzzy-name-record").css('display', 'none');
            }
            $(".mask").removeClass("active");
        }

        // Call the closeModal function on the clicks/keyboard

        $(".close, .mask").on("click", function() {
            closeModal();
        });

        $(".savebtn").on("click", function() {
            var TableData = new Array();

            $('#marksTable tr').each(function(row, tr) {
                TableData[row] = {
                    "S_No": $(tr).find('td:eq(0)').text(),
                    "Student_Name": $(tr).find('td:eq(1)').text(),
                    "Fuzzy_Name": $(tr).find('td:eq(2)').text(),
                    "Mark": $(tr).find('td:eq(3) input').val()
                }
            });
            TableData.shift();
            var filename = $('#file_input').prop("files")[0]['name'];
            console.log(TableData);
            $.ajax({
                url: BASE_URL + '/Tablemanagement/savetable',
                data: {
                    Tablename: filename,
                    Tabledata: TableData,
                },
                error: function(e) {
                    // $('#info').html('<p>An error has occurred</p>');
                },
                dataType: 'json',
                success: function(data) {
                    setTimeout(function() {
                        n1.show('slow', {}, 500)
                    }, 1000);
                    setTimeout(function() {
                        n1.hide('blind', {}, 500)
                    }, 4000);
                },
                type: 'POST'
            });
        });
        // $(".load_table").on("click", function() {
        //     var id = $(".load_table").val();
        //     console.log(id);
        //     // $.ajax({
        //     //     url: BASE_URL + '/Tablemanagement/savetable',
        //     //     data: {
        //     //         Tablename: filename,
        //     //         Tabledata: TableData,
        //     //     },
        //     //     error: function(e) {
        //     //         // $('#info').html('<p>An error has occurred</p>');
        //     //     },
        //     //     dataType: 'json',
        //     //     success: function(data) {
        //     //         setTimeout(function() {
        //     //             n1.show('slow', {}, 500)
        //     //         }, 1000);
        //     //         setTimeout(function() {
        //     //             n1.hide('blind', {}, 500)
        //     //         }, 4000);
        //     //     },
        //     //     type: 'POST'
        //     // });
        // });

        $(document).keyup(function(e) {
            if (e.keyCode == 27) {
                closeModal();
            }
        });
        //start loading the configuration file after the application has loaded in the browser
        oninit = loadConfigurations();
    }

)('../config.json');