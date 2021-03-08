@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Deleted Stories
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stories as $story)
                                    <tr>
                                        <td>
                                            {{ $story->title }}
                                        </td>
                                        <td>
                                            {{ $story->type }}
                                        </td>
                                        <td>
                                            {{ $story->user->name }}
                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('stories.show', [$story]) }}"
                                                class="btn btn-secondary">View</a>

                                            <a href="{{ route('stories.edit', [$story]) }}"
                                                class="btn btn-secondary">Edit</a>

                                            <form action="{{ route('stories.destroy', [$story]) }}" method="POST"
                                                style="display:inline-block">
                                                @method('DELETE')
                                                @csrf
                                                @can('delete', $story)
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                @endcan
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $stories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
