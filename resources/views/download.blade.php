@extends('layouts')

@section('css')
<link rel="stylesheet" href="{{asset('css/download.css')}}">
@endsection

@section('content')
<div class="page-title">
    <h1>Library</h1>
</div>
<div class="download-table">
    <table>

        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Size</th>
                <th class="download-button">Download</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1, Cell 1</td>
                <td>Row 1, Cell 2</td>
                <td>Row 1, Cell 3</td>
                <td class="download-button">
                    <button>Download</button>
                </td>
            </tr>
            <tr>
                <td>Row 1, Cell 1</td>
                <td>Row 1, Cell 2</td>
                <td>Row 1, Cell 3</td>
                <td class="download-button">
                    <button>Download</button>
                </td>
            </tr>
            <tr>
                <td>Row 1, Cell 1</td>
                <td>Row 1, Cell 2</td>
                <td>Row 1, Cell 3</td>
                <td class="download-button">
                    <button>Download</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

</html>