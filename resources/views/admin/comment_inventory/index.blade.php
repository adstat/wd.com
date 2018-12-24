@extends('admin.layouts.app')
@section('title', 'hello,world')
@stack('scripts')
<script>
    $(document).ready(function(){
        alert('~~~');
    });
</script>
@section('sidebar')
    @parent
    <p>这将追加到主布局的侧边栏。</p>
@endsection

@section('content')
    <p>这是主体内容。</p>
@endsection

{{--@section('jss')--}}
    {{----}}
{{--@endsection--}}

@section('loading')

@endsection