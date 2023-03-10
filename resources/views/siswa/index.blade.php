@extends('layout.layout')
@section('content')
<div class="border rounded mt-5 mx-auto d-flex flex-column align-items-stretch bg-white" style="width: 380px;">
    <div class="d-flex justify-content-between flex-shrink-0 p-3 link-dark  border-bottom">
        <span class="fs-5 fw-semibold">Absensi Siswa: {{$data->total()}}</span>
        <a href="{{ url('/siswas/create') }}" class="btn btn-sm btn-primary">Tambahkkan Absensi</a>
    </div>
    
    @foreach ($data as $item)
    <div class="list-group list-group-flush border-bottom scrollarea">
        <div class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <strong class="mb-1">Siswa: {{$item->siswa}}</strong>
                <small>Wed</small>
            </div>
            <div class="col-10 mb-1 small">Kelas: {{$item->user}}</div>
                <div class="group-action">
                    <form action="{{url("/siswas/$item->id")}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <a href="{{url("/siswas/$item->id/edit")}}" class="badge bg-info text-white">edit</a>
                        <button type="submit" class="badge bg-danger text-white">delete</button>
                    </form>
                </div>
            </form>
            
        </div>
    </div>
@endforeach

<br>
{{ $data->links('pagination::bootstrap-4') }}
</div>
@endsection