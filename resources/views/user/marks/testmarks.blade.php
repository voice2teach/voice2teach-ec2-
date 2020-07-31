@extends('layouts.app')

@section('content')
    <div id="loading_screen"><h4>Importing Data...</h4><img id="start_img" src="{{asset('assets/img/loading.gif')}}" alt=""></div>
    <div id="main">
        <div id="actionbar" class="clearfix">
            <button class="savebtn">Save</button>
            <input id="file_input" class='StandardFont' type="file" placeholder="Import file">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">More</button>
                <div id="myDropdown" class="dropdown-menu">
                    <a id="new_table" class="dropdown-item">New Table</a>
                    <a href="#" id="download_button" class='StandardFont dropdown-item'>Export</a>
                </div>
            </div>           
        </div>

        <div id="info">
            <p id="info_start">Import a file and then click on the "Start lisening" button and begin speaking.</p>
            <p id="info_speak_now">Speak now.</p>
            <p id="info_no_speech">No speech was detected. You may need to adjust your
                <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
                microphone settings</a>.
                </p>
            
            <p id="info_no_microphone" style="display:none">
                No microphone was found. Ensure that a microphone is installed and that
                <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
                microphone settings</a> are configured correctly.
            </p>
            
            <p id="info_allow">Click the "Allow" button above to enable your microphone.</p>
            
            <p id="info_denied">Permission to use microphone was denied.</p>
            
            <p id="info_blocked">Permission to use microphone is blocked. To change,
                go to chrome://settings/contentExceptions#media-stream
            </p>
            
            <p id="info_upgrade">Web Speech API is not supported by this browser.
                Upgrade to <a href="//www.google.com/chrome">Chrome</a>
                version 25 or later.
            </p>

            <img id="start_img" src="{{asset('assets/img/mic.gif')}}" alt="">

            <p id="no_result_found">Couldn' find a match. Try again.</p>
        </div>

        <div id="noFileSelected">
            <i>No file imported, please import a file!</i>
        </div>

        <div id="tableContainer" style="display:none!important;">
            <table border="1" id="marksTable">
                <tr>
                    <th>S.No.</th>
                    <th>Student Name</th>
                    <th class="Fuzzy_Name_th">Fuzzy Name</th>
                    <th>Marks</th>
                </tr>
            </table>
        </div>
    </div>
    <!-- <footer>
        This application is designed to be used in Google's Chrome browser only.
    </footer> -->
    <div id="conflict_window">
        <div>
            <div id="selection_box">
                <b>Select the student name</b>
                <hr>
    
                <div id="choices_container">
                </div>
    
                <button id='close_conflict_window'>Cancel</button>
            </div>
        </div>
    </div>

    <div class="mask" role="dialog"></div>
    <div class="modalview" role="alert">
        <div class="modal-body">
            <button class="close" role="button">X</button>
            <div><input type="text" class="record-fuzzy-name"></div>
            <p class="fuzzy-process">Please click Start button to record.</p>         
        </div>
        <div class="modal-footer">
            <button class="start-fuzzy-name-record">Start Recording</button>
            <button class="save-fuzzy-name-record">Save</button>
        </div>
    </div>
<script type="text/javascript" src="{{asset('assets/lib/fuzzyset.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/index.js')}}"></script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

</script>
@endsection