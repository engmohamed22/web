@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                       {{ Session::get('success')}}
                    </div>
                    @endif
                    
                    <div class="row gap-1 col-8">
                    <a href="/contacts/create" class="btn btn-primary">Add Contact</a>&nbsp;&nbsp;<a href="/home" class="btn btn-primary">Back to Home</a>
                    &nbsp;&nbsp; <form action="/search" method="GET">
                          <div class="input-group">
                                <input type="search" name="search" class="form-control" placeholder="Search by name">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </span>
                          </div>
                        </form>
                    </div>
                    <br><br>
                    @if(count($contacts)>0)
                    <table class="table  table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                             <td>{{ $contact->name }}</td>
                             <td>{{ $contact->email }}</td>
                             <td>{{ $contact->phone }}</td>
                             <td>{{ $contact->address }}</td>
                             <td><a href="/contacts/{{$contact->id}}/edit" class="btn btn-warning">Edit</a></td>
                             <td>
                              <form action="/contacts/{{$contact->id}}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                              </form>
                             </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   {{$contacts->links()}}
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
