@extends('layouts.manage')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-2 leftMenu">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">演示系统</div>

                            <div class="panel-body">
                                这个是模型说明
                            </div>
                            <ul class="list-group subMenu">
                                <li class="list-group-item active"><a href="{{url('/manage/demo')}}">列表页</a></li>
                                <li class="list-group-item"><a href="{{url('/manage/demo/create')}}"
                                    >新增</a></li>
                            </ul>
                        </div>
                        <div class="panel panel-warning">
                            <div class="panel-heading">子菜单分区</div>

                            <ul class="list-group subMenu">
                                <li class="list-group-item active"><a href="{{url('/manage/demo')}}">报表</a></li>
                                <li class="list-group-item"><a href="{{url('/manage/demo/create')}}"
                                    >新增</a></li>
                                <li class="list-group-item"><a href="{{url('/manage/demo')}}"
                                    >企业管理</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <ol class="breadcrumb">
                    <li><a href="#">供应商系统</a></li>
                    <li class="active">演示模型</li>
                </ol>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4">模块名称</div>
                            <div class="col-md-8 text-right">
                                这里显示操作状态
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4"><a href="{{url('/manage/demo/create')}}"
                                                     class="btn btn-primary">新增</a></div>
                            <div class="col-md-8 text-right">
                                <form method="get" class="form-inline">
                                    <div class="input-group">

                                        <input type="text" class="form-control" placeholder="关键字"
                                               name="key" value=""> <span class="input-group-btn">
								<button class="btn btn-default" type="submit">搜索</button>
							</span>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form method="Post" class="form-inline">
                        <table class="table table-bordered table-hover  table-condensed">
                            <thead>
                            <tr style="text-align: center" class="text-center">
                                <th style="width: 20px"><input type="checkbox"
                                                               name="CheckAll" value="Checkid"/></th>
                                <th style="width: 80px;"><a href="">编号</a></th>
                                <th><a href="">姓名</a></th>
                                <th><a href="">所属上级</a></th>
                                <th style="width: 100px;"><a href="">责任人</a></th>
                                <th style="width: 140px;"><a href="">注册时间</a></th>
                                <th style="width: 100px;"><a href="">状态</a></th>
                                <th style="width: 180px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $item)
                                <tr>
                                    <td><input type="checkbox" value="{{$item->id}} "
                                               name="id"/></td>
                                    <td style="text-align: center">{{$item->id}} </td>
                                    <td><a
                                                href="{{url('/manage/demo/detail/'.$item->id)}}">{{$item->name}}</a>
                                    </td>
                                    <td style="text-align: center">
                                        @if(isset($item->parent)){{$item->parent->name}}@endif</td>
                                    <td style="text-align: center"> @if(isset($item->liable)){{$item->liable->name}}@endif</td>
                                    <td style="text-align: center">{{$item->created_at}}</td>
                                    <td style="text-align: center">
                                        {{$item->state==0?"正常":"禁用"}}</td>

                                    <td style="text-align: center"><a
                                                href="{{url('/manage/demo/edit/'.$item->id)}}">编辑</a>
                                        |
                                        <a
                                                href="{{url('/manage/demo/create?id='.$item->id)}}">复制</a>
                                        |
                                        <a
                                                href="{{url('/manage/demo/delete/'.$item->id)}}">删除</a>
                                        |
                                        <a
                                                href="{{url('/manage/demo?pid='.$item->id)}}">下属({{$item->children->count()}}
                                            )</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-4"><a
                                        href="{{url('/demo/resources/guide/create/')}}"
                                        class="btn btn-warning">批量删除</a></div>
                            <div class="col-md-8 text-right">
                                {!! $lists->links() !!}
                            </div>
                        </div>

                    </div>
                </div>
                @include("common.success")
                @include("common.errors")
            </div>
        </div>
    </div>
@endsection
