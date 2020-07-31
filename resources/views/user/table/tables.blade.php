@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="page-header">
            <h2>My Tables</h2>
        </div>
        <table width="100%" style="text-align: center;">
            <tbody>
            <tr>
                <th>Table No</th>
                <th>Table Name</th>
                <th>Time</th>
                <th></th>
            </tr>   
            <?php  $i = 1 ?>          
            <?php foreach($user_tables as $value) { ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><a href="{{url('Tablemanagement/loadtable?t_id=')}}<?php echo $value->ID;?>"><?php echo $value->Table_Name;?></a></td>
                <td><a href="{{url('Tablemanagement/loadtable?t_id=')}}<?php echo $value->ID;?>"><?php echo $value->Time;?></a></td>
                <!-- <td><a href="{{url('Tablemanagement/loadtable?t_id=<?php echo $value->ID;?>"><button class="load_table" style="width:100%;" value="<?php echo $value->ID;?>"><i class="fa fa-folder-open-o" aria-hidden="true"></i></button></a></td> -->
                <td><a href="{{url('Tablemanagement/deletetable?t_id=')}}<?php echo $value->ID;?>"><button class="delete_table" style="width:100%;" value="<?php echo $value->ID;?>"><i class="fa fa-trash" aria-hidden="true"></i></button></a></td>
            </tr>    
            <?php $i++; ?>
            <?php } ?>
            </tbody>
        </table>
	</div><!-- .row -->
</div><!-- .container -->
@endsection