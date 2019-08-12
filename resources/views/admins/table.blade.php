@extends('admins/layouts.admin')
@section('content')
  <!-- Content Header (Page header) -->

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tables</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content-header">
      <div class="container-fluid">
        <h4> Table Admin  </h4>

      	<table class="table table-bordered table-striped" >
      		<tr>
      			<th> ID </th>
      			<th> Nom </th>
      			<th> E-mail </th>
            <th> Date d inscription </th>
      		</tr>
      		@foreach ($admin as $i => $a)
            @if($i == 0)
      	     <tr>
  				      <td>{{ $a->id }}</td>
        				<td>{{ $a->name }}</td>
  			       	<td>{{ $a->email }}</td>
                <td>{{ $a->created_at }}</td>
                <td><i class="fa fa-lock" aria-hidden="true"></i>
</td>

              </tr>
  			       	@else
              <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->email }}</td>
                <td>{{ $a->created_at }}</td>

                <td>

                <a href= "{{ URL('users/'. $a->id . '/edit' ) }}" class="btn btn-info">Edit</a>

                  <form action="{{ URL('users/'. $a->id) }}" method="post">
                       {{csrf_field()}}
                       {{method_field('DELETE')}}
                       <button type="submit" class="btn btn-danger"> Delete  </button>
                  </form>
                 </td>
                </tr>

            @endif
      		@endforeach
           <tr>
                <a href="{{ url('users/create') }}" class="btn btn-primary">Add New Admin</a>
          </tr>
      	</table>
        <h4> Table User  </h4>
        <table class="table table-bordered table-striped" >
          <tr>
            <th> ID </th>
            <th> Nom </th>
            <th> E-mail </th>
            <th> Date d inscription </th>
          </tr>
          @foreach ($user as $u)
            <tr>
          <td>{{ $u->id }}</td>
          <td>{{ $u->name }}</td>
          <td>{{ $u->email }}</td>
          <td>{{ $u->created_at }}</td>
          <td>
                  <form action="{{ URL('users/'. $u->id) }}" method="post">
                       {{csrf_field()}}
                       {{method_field('DELETE')}}
                       <button type="submit" class="btn btn-danger"> Delete  </button>
                  </form>
                 </td>



          @endforeach

        </table>

      </div>
	</section>
@endsection
