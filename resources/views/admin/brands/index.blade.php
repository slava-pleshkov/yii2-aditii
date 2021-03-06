@extends('admin.layouts.main')

@section('title',__('admin.brands-title'))

@section('content')
    <div class="row justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-lg-9">
            <div class="d-flex">
                <h1 class="h2">@yield('title')</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="pull-right">
                <a class="btn btn-original" href="{{ route('brands.create') }}">{{ __('admin.create-brands') }}</a>
            </div>
        </div>
    </div>
    @include('admin.includes.success')
    <div class="table-responsive">
        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th scope="col">{{ __('admin.brands-id') }}</th>
                <th scope="col">{{ __('admin.brands-name') }}</th>
                <th scope="col">{{ __('admin.brands-images') }}</th>
                <th scope="col">{{ __('admin.brands-description') }}</th>
                <th scope="col">{{ __('admin.brands-url') }}</th>
                <th scope="col">{{ __('admin.status') }}</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($main as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td scope="row">{{ $item->name }}</td>
                    <td scope="row" class="text-center"><img src="{{ asset('storage/'.$item->images) }}" width="100px"></td>
                    <td scope="row">{{ $item->description }}</td>
                    <td scope="row">{{ $item->url }}</td>
                    <td scope="row">
                        @if($item->status)
                            {{ __('admin.enabled') }}
                        @else
                            {{ __('admin.disabled') }}
                        @endif
                    </td>
                    <td scope="row">
                        <a href="{{ route('brands.show',$item->id) }}"><i class="far fa-eye"></i></a>
                        <a href="{{ route('brands.edit',$item->id) }}"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('brands.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
