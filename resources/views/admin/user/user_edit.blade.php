@extends('admin.layouts.main')

{{--顶部前端资源--}}
@section('styles')

@endsection

{{--页面内容--}}
@section('content')
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> @if($is_edit)编辑用户@else新增用户@endif </span>
                    </div>
                </div>
                <div class="portlet-body form">
					@if($is_edit)
                    <form role="form" lpformnum="1" _lpchecked="1" method="post" action="{{ route('user.update', [$user->id]) }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-body">
                            <div class="form-group">
                                <label>用户名</label>
                                <input type="text" class="form-control" placeholder="Disabled" disabled="" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>邮箱</label>
                                <input type="text" class="form-control" placeholder="Readonly" readonly="" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label>用户组</label>
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" @if($user->hasRole($role->name)) selected @endif @if($user->id == 1) disabled @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>加入时间</label>
                                <input type="text" class="form-control" placeholder="Disabled" disabled="" value="{{ $user->created_at }}">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn blue">提交</button>
                        </div>
                    </form>
					@else
					<form role="form" lpformnum="1" _lpchecked="1" method="post" action="{{ route('user.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-body">
                            <div class="form-group">
                                <label>用户名</label>
                                <input type="text" class="form-control" name="name" placeholder="用户名" value="">
                            </div>
							<div class="form-group">
                                <label>密码</label>
                                <input type="password" class="form-control" name="password" placeholder="密码" value="">
                            </div>
                            <div class="form-group">
                                <label>邮箱</label>
                                <input type="text" class="form-control" name="email" placeholder="邮箱" value="">
                            </div>
                            <div class="form-group">
                                <label>用户组</label>
                                <select class="form-control" name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn blue">提交</button>
                        </div>
                    </form>
					@endif
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
@endsection

{{--尾部前端资源--}}
@section('script')

@endsection