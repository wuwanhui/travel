@extends('layouts.manage')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">

            <li><a href="#">管理中心</a></li>
            <li class="active">开放平台</li>
        </ol>
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">开放平台</div>

                    <div class="panel-body ">
                        <ul>
                            <li>
                                <a href="{{url('/manage/open/apply')}}" class="active">应用管理</a>
                            </li>
                            <li>
                                <a href="{{url('/manage/open/api')}}">接口开放</a>
                            </li>
                            <li>
                                <a href="{{url('/manage/open/ota')}}">OTA对接</a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <form class="form-horizontal" role="form" method="POST">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-2  text-left">
                                    <button type="button" class="btn btn-default"
                                            onclick="vbscript:window.history.back()">返回
                                    </button>
                                    <button type="submit" class="btn  btn-primary">保存</button>

                                </div>
                                <div class="col-xs-10 text-right"></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12">
                                <fieldset>
                                    <legend>基本信息</legend>
                                    {!! csrf_field() !!}
                                    @if($users )
                                        <div class="form-group{{ $errors->has('userId') ? ' has-error' : '' }}">
                                            <label for="userId" class="col-md-3 control-label">所属用户：</label>

                                            <div class="col-md-9">
                                                <select name="userId" class="form-control" style="width: auto;">
                                                    @foreach($users as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('userId'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('userId') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif


                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-3 control-label">应用名称：</label>

                                        <div class="col-md-9">
                                            <input id="name" type="text" class="form-control" name="name"
                                                   value="{{ old('name') }}">

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('appId') ? ' has-error' : '' }}">
                                        <label for="appId" class="col-md-3 control-label">appId：</label>

                                        <div class="col-md-9">
                                            <input id="appId" type="text" class="form-control" name="appId"

                                                   value="{{ old('appId') }}">

                                            @if ($errors->has('appId'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('appId') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('appSecret') ? ' has-error' : '' }}">
                                        <label for="appSecret" class="col-md-3 control-label">appSecret：</label>

                                        <div class="col-md-9">
                                            <input id="appSecret" type="text" class="form-control" name="appSecret"

                                                   value="{{ old('appSecret') }}">

                                            @if ($errors->has('appSecret'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('appSecret') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('ip') ? ' has-error' : '' }}">
                                        <label for="ip" class="col-md-3 control-label">授信IP：</label>

                                        <div class="col-md-9">
                                            <input id="ip" type="text" class="form-control" name="ip"
                                                   placeholder="多个IP使用逗号做分隔"
                                                   value="{{ old('ip') }}">

                                            @if ($errors->has('ip'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('ip') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('callback') ? ' has-error' : '' }}">
                                        <label for="callback" class="col-md-3 control-label">回调地址：</label>

                                        <div class="col-md-9">
                                            <input id="callback" type="text" class="form-control" name="callback"
                                                   value="{{ old('callback') }}">

                                            @if ($errors->has('callback'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('callback') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                        <label for="state" class="col-md-3 control-label">状态：</label>

                                        <div class="col-md-9">
                                            <select id="state" name="state" class="form-control" style="width: auto;">
                                                <option value="0">正常</option>
                                                <option value="1">停用</option>
                                            </select>

                                            @if ($errors->has('state'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                                        <label for="remark" class="col-md-3 control-label">内部备注：</label>

                                        <div class="col-md-9">

                                            <textarea id="remark" type="text" class="form-control"
                                                      name="remark"
                                                      style=" height: 100px"
                                            >{{old('refundable') }}</textarea>

                                            @if ($errors->has('remark'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('remark') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                @include("common.success")
                @include("common.errors")   </div>
        </div>
    </div>
@endsection
