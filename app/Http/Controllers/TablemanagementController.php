<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TablemanagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function loadtable(Request $request){
        $data = array();
        $t_id = $request->t_id;
        $request->session()->put('current_table', $t_id);
		$data['tableid'] = $t_id;
        $tablename = "Table_".Auth::id()."_".$t_id;
        $data['tabledata'] = DB::table($tablename)->get();
        
        return view('user/marks/testmarks_load', $data);
    }

    public function createtable(Request $request){
        $table_name = $request->Tablename;
        $table_data = $request->Tabledata;
        $current_user = Auth::id();
        $item = DB::table('Tables')->orderBy('ID', 'desc')->get();
        $max = (count($item) > 0)?$item[0]->ID:0;
        
        // $max = Table::where('ID',max('ID'))->value('ID');
        // $max = Table::whereRaw('ID = (select max(`ID`) from Tables)')->value('ID');
        
        $max += 1;
        
        $date = date('Y-m-d H:i:s');
        $sql = DB::table('Tables')->insert(['ID' => $max, 'Table_Owner' => $current_user, 'Table_Name' => $table_name, 'Time' => $date]);
        
        $tablename = "Table_".$current_user."_".$max;
        
        Schema::create($tablename, function (Blueprint $table) {
            // $table->increments('ID');
            $table->integer('ID');
            $table->string('Student_Name')->nullable();
            $table->string('Fuzzy_Name')->nullable();
            $table->integer('Mark')->nullable();
        });

        for($i = 0; $i < count($table_data); $i ++){
            $row = $table_data[$i];
            $sql = DB::table($tablename)->insert([ 'ID' => $row['S_No'], 'Student_Name' => $row['Student_Name'], 'Fuzzy_Name' => $row['Fuzzy_Name'], 'Mark' => $row['Mark'] ]);
        }

        $request->session()->put('current_table', $max);
        return $max;
    }
    
    public function savetable(Request $request){
        $table_name = $request->Tablename;
        $table_data = $request->Tabledata;
        $date = date('Y-m-d H:i:s.000');
        $current_user = Auth::id();
        $current_table = $request->session()->get('current_table');
        $sql = DB::update("UPDATE Tables SET Time = ? WHERE ID = ? ", [$date, $current_table ]);
        
        $tablename = "Table_".$current_user."_".$current_table;
        if (!isset($table_data))
          return;
        for($i = 0; $i < count($table_data); $i ++){
          $row = $table_data[$i];
          DB::table($tablename)->where('ID', $row['S_No'])->update(['Student_Name' => $row['Student_Name'], 'Fuzzy_Name' => $row['Fuzzy_Name'], 'Mark' => $row['Mark'] ]);
        //   $sql = DB::update("UPDATE $tablename SET Student_Name = '{$row['Student_Name']}',Fuzzy_Name = '{$row['Fuzzy_Name']}',Mark = '{$row['Mark']}' WHERE ID = '{$row['S_No']}'");
        }
        $data = array('result' => 'success');
		return response()->json($data);	
    }

    public function new_table(Request $request){
        $table_name = $request->Tablename;
        $current_user = Auth::id();

        $item = DB::table('Tables')->orderBy('ID', 'desc')->get();
        $max = (count($item) > 0)?$item[0]->ID:0;
        // $max = Table::whereRaw('ID = (select max(`ID`) from Tables)')->value('ID');
        // if($max->count() == 0){
        //     $max = 1;
        // }
        // if($max == 0){
        //     $max = 1;
        // }else{
            $max += 1;
        // }
        $date = date('Y-m-d H:i:s');

        Table::insert(['ID' => $max, 'Table_Owner' => $current_user, 'Table_Name' => $table_name, 'Time' => $date]);
        
        $tablename = "Table_".$current_user."_".$max;

        Schema::create($tablename, function (Blueprint $table) {
            // $table->increments('ID');
            $table->integer('ID');
            $table->string('Student_Name')->nullable();
            $table->string('Fuzzy_Name')->nullable();
            $table->integer('Mark')->nullable();
        });

        $request->session()->put('current_table', $max);
        return $max;
    }
    
    public function save_studentname(Request $request){
        if (!isset($request->student_name))
        return;
        $student_name = $request->student_name;
        $current_user = Auth::id();
        $current_table = $request->session()->get('current_table');

        $tablename = "Table_".$current_user."_".$current_table;
        
        // $id = DB::table($tablename)->max('ID');
        $item = DB::table($tablename)->orderBy('ID', 'desc')->get();
        $max = (count($item) > 0)?$item[0]->ID:0;
        // $max = DB::table($tablename)->where('ID', $max_id)->value('ID');
        // if($max->count() == 0){
        //     $max = 1;
        // }
        // if($max == 0){
        //     $max = 1;
        // }else{
            $max += 1;
        // }

        DB::table($tablename)->insert(['ID' => $max, 'Student_Name' => $student_name]);
        $data = array('result' => 'success');
		return response()->json($data);
    }

    public function deletetable(Request $request){
        // $data = new stdClass();
        $t_id = $request->t_id;
        $request->session()->put('current_table', $t_id);
        // $data['tableid'] = $t_id;
        
        $current_user = Auth::id();
        $tablename = "Table_".$current_user."_".$t_id;
        DB::table('Tables')->where('ID', '=', $t_id)->delete();
        DB::statement("DROP TABLE $tablename");

		return redirect('User/mytables');
    }
    
	public function exportCSV_(Request $request){
		
		// file name
		// $filename = 'Wave_And_Sprint_'.date('Ymd').'.csv';
		$filename = $this->getdownloadfilename($request);
		// $filename = $filename[0]['Table_Name'];
		
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; "); 

		// get data
		$usersData = $this->getdownloaddata($request);

		// file creation
		$file = fopen('php://output', 'w');

		$header = array("ID","Student Name","Mark");
		fputcsv($file, $header);

		foreach ($usersData as $key=>$line){
		 fputcsv($file,$line);
		}

		fclose($file);
		exit;
    }
    public function exportCSV(Request $request)
    {
        $filename = $this->getdownloadfilename($request);
        // $fileName = 'tasks.csv';
        // $tasks = Task::all();
        $tasks = $this->getdownloaddata($request);

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array("ID","Student Name","Mark");

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['ID']  = $task->ID;
                $row['Student_Name']    = $task->Student_Name;
                $row['Mark']    = $task->Mark;

                fputcsv($file, array($row['ID'], $row['Student_Name'], $row['Mark']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    function getdownloaddata(Request $request){ 
        $owner_id = Auth::id();
        $current_table = $request->session()->get('current_table');
        $response = array();        
        $tablename = "Table_".$owner_id."_".$current_table;
        $result = DB::table($tablename)->get();
        $response = $result;      
        return $response;
      }
      function getdownloadfilename(Request $request){        
        // $response = array();
        $current_table = $request->session()->get('current_table');
        $response = DB::table("Tables")->where("ID", $current_table)->value("Table_Name");
        return $response;
      }


}
