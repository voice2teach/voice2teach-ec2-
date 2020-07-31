@extends('layouts.app')

@section('content')
{{--<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>--}}
    <div id="main">
        <div id="actionbar" class="clearfix">
            <button class="savebtn">Save</button>
            <div class="dropdown">
                <button  class="dropbtn" data-toggle="dropdown">More</button>
                <div id="myDropdown" class="dropdown-menu">
                    <a class="dropdown-item" onclick="importCSVFile()" href="{{url('User/marks')}}">Import</a>
                    <a class="dropdown-item" onclick="exportCSVFile()" class='StandardFont'>Export</a>
                    <a class="dropdown-item" id="new_table">New Table</a>
                    <!-- <a class="dropdown-item" onclick="showNewTableDialog()" id="new_table">New Table</a> -->
                    <a class="dropdown-item" id="add_name">Add Student</a>
                </div>
            </div>           
        </div>

        <div id="info">
            <p id="info_start">Click on the "Start lisening" button and begin speaking.</p>
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
        </div>

        <div id="tableContainer">
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
    <div class="modal fade" id="add_name_Modal" role="dialog">
        <div class="modal-dialog modal-md" style="margin-top:200px;">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Assignment</h4>
            </div>
            <div class="modal-body">
                <div class="form_group">
                    <p>Student Name</p>
                    <input type="text" class="form-control" id="studentname" placeholder="Enter Name (ex:lastname,firstname)">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" id="add_name_btn" data-dismiss="modal">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <!-- <footer >
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
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
//   document.getElementById("myDropdown").classList.toggle("show");
  $("#myDropdown").dropdown();
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
function importfileFunction() {
    $("#file_input").toggle();
}
var tableid = <?php echo json_encode($tableid); ?>;
var tabledata = <?php echo json_encode($tabledata); ?>;
var data1 = new Array();
var data2 = new Array();
var data3 = new Array();
var idx = 0;
for(var i = 0; i < tabledata.length; i++){ 
    var row = tabledata[i]; 
    data1[idx] = row['Student_Name'];
    data2[idx] = row['Fuzzy_Name'];
    data3[idx] = row['Mark'];
    idx ++;
} 
    // function showNewTableDialog(){
    //     $("#add_name_Modal").modal();
    // }
    function importCSVFile(){
        document.location.href = "{{url('User/marks')}}";
    }
    function exportCSVFile(){
        document.location.href = "{{url('Tablemanagement/exportCSV')}}";
    }
</script>
<script type="text/javascript" src="{{asset('assets/lib/fuzzyset.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/index_load.js')}}"></script>
@endsection