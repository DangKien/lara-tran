@extends('Backend.Layouts.default')
@section ('title', 'ZeLike 澤樣室內設計')
@section('content')
<div id="content-container">
	<div id="page-head">
        <div id="page-title">
            <h1 class="page-header text-overflow">Ngôn ngữ</h1>
        </div>
        <ol class="breadcrumb">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
			<li><a href="#">{{ isset($language) ? 'Cập nhật' : 'Thêm mới' }}</a></li>
        </ol>
    </div>
    @php
		$languages = app('Language')->getLanguage();
    @endphp
	<div id="page-content">
	    <div class="panel-body">
	        <div class="panel">
	            <div class="panel">
		            <div class="panel-heading">
		               	<div class="panel-heading">
			                <h3 class="panel-title text-main text-bold mar-no">
			                	<i class="ti-pencil"></i> {{ isset($language) ? 'Cập nhật ngôn ngữ' : 'Thêm mới ngôn ngữ' }} 
			                </h3>
			            </div>
		            </div>
	                <div class="panel-body">
	                	<div class="col-md-12">
	                		<div class="tab-base">
	                		    <!--Nav Tabs-->
	                		    <ul class="nav nav-tabs tabs-border">
	                		        <li class="active">
	                		            <a data-toggle="tab" href="#demo-lft-tab-1">Content translation</a>
	                		        </li>
	                		        <li>
	                		            <a data-toggle="tab" href="#demo-lft-tab-2">Detail</a>
	                		        </li>
	                		    </ul>
	                			<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" >
        		                @csrf
		                		    <!--Tabs Content-->
		                		    <div class="tab-content">
		                		    	<!-- Tab language -->
		                		        <div id="demo-lft-tab-1" class="tab-pane fade active in">
		                		        	<div class="panel-body col-sm-offset-1">
		                		        		<div class="tab-base">
		                		        		    <!--Nav Tabs-->
		                		        		    <ul class="nav nav-tabs tabs-border">
														@foreach (@$languages as $key => $languageTab)
		                		        		        <li class="{{ $key == 0 ? 'active' : '' }}">
		                		        		            <a data-toggle="tab" href="#language-tab-{{ @$languageTab->id }}">
		                		        		            	{{ @$languageTab->name_display }}
		                		        		            </a>
		                		        		        </li>
		                		        		        @endforeach
		                		        		    </ul>
		                		        		    <div class="tab-content">
		                		                        @foreach (@$languages as $key => $languageTab)
		                		                        <div id="language-tab-{{ @$languageTab->id }}" 
		                		                        	class="tab-pane {{ $key == 0 ? 'fade active in' : '' }}">
									                        <div class="col-sm-10">
									                            <div class="form-group">
									                                <label class="control-label text-bold">Tên loại sản phẩm 
									                                	<span class="text-danger">*</span>
									                                </label>
									                                <input type="text" name="name[{{ @$languageTab->id }}]" class="form-control">
									                                @if ($errors->has('name_display'))
										                            	<p class="text-left text-danger">{{ $errors->first('name_display') }}</p>
										                            @endif
									                            </div>
									                        </div> 
									                        <div class="col-sm-10">
							                                    <div class="form-group">
							                                        <label class="control-label text-bold">Mô tả loại sản phẩm
							                                        	<span class="text-danger">*</span>
							                                        </label>
							                                        <textarea name="description[{{ @$languageTab->id }}]" placeholder="Message" rows="5" class="form-control"></textarea>
							                                        @if ($errors->has('icon'))
							        	                            	<p class="text-left text-danger">{{ $errors->first('icon') }}</p>
							        	                            @endif
							                                    </div>
							                                </div>
							                                <div class="col-sm-10">
							                                    <div class="form-group">
							                                        <label class="control-label text-bold">Meta Title
							                                        	<span class="text-danger">*</span>
							                                        </label>
							                                        <input type="text" name="meta_title[{{ @$languageTab->id }}]" class="form-control">
							                                        @if ($errors->has('locale'))
							        	                            	<p class="text-left text-danger">{{ $errors->first('locale') }}</p>
							        	                            @endif
							                                    </div>
							                                </div>
									                        <div class="col-sm-10">
									                            <div class="form-group">
									                                <label class="control-label text-bold">Meta Description 
									                                	<span class="text-danger">*</span>
									                                </label>
									                                <textarea name="meta_description[{{ @$languageTab->id }}]" placeholder="Message" rows="5" class="form-control"></textarea>
									                                @if ($errors->has('icon'))
										                            	<p class="text-left text-danger">{{ $errors->first('icon') }}</p>
										                            @endif
									                            </div>
									                        </div>
							                                <div class="col-sm-10">
							                                    <div class="form-group">
							                                        <label class="control-label text-bold">Meta Content
							                                        	<span class="text-danger">*</span>
							                                        </label>
							                                        <textarea name="meta_content[{{ @$languageTab->id }}]" placeholder="Message" rows="5" class="form-control"></textarea>
							                                        @if ($errors->has('icon'))
							        	                            	<p class="text-left text-danger">{{ $errors->first('icon') }}</p>
							        	                            @endif
							                                    </div>
							                                </div>
						                            	</div>
		                		                        @endforeach
	                		                    	</div>
		                		        		</div>
	                		                    
	                		                </div>
                		                </div>
		                		        <!-- Tab detail -->
		                		        <div id="demo-lft-tab-2" class="tab-pane fade">
		                		            <div class="panel-body col-sm-offset-1">
		                					<!-- data-parsley-validate -->
				    		                    <div class="row">
				    		                        <div class="col-sm-10">
				    		                            <div class="form-group">
				    		                                <label class="control-label text-bold">Loại sản phẩm cha
				    		                                	<span class="text-danger">*</span>
				    		                                </label>
				    		                                <select class="selectpicker" data-live-search="true" data-width="100%"name="parent_id">
								                                <option value="0">-- None --</option>
								                                
								                            </select>
				    		                                @if ($errors->has('parent_id'))
				    			                            	<p class="text-left text-danger">{{ $errors->first('parent_id') }}</p>
				    			                            @endif
				    		                            </div>
				    		                        </div> 

				    		                       <!--  <div class="col-sm-10">
				    		                            <div class="form-group">
				    		                                <label class="control-label text-bold">Icon
				    		                                	<span class="text-danger">*</span>
				    		                                </label>
				    		                                <input type="text" name="icon" class="form-control"
				    		                                value="{{ @$language->icon ? $language->icon : @old('icon') }}">
				    		                                @if ($errors->has('icon'))
				    			                            	<p class="text-left text-danger">{{ $errors->first('icon') }}</p>
				    			                            @endif
				    		                            </div>
				    		                        </div> -->

					                                <div class="col-sm-10"  style="margin-bottom: 15px;">
					                                    <div class="form-group has-feedback row">
					        	                            <label class="col-sm-3 control-label text-bold" style="padding-top: 10px;">Trạng thái</label>
					        	                            <div class="col-sm-7">
					        	                                <div class="radio">
					        	                                    <input id="AVAILABLE" class="magic-radio" type="radio" name="status" value="{{ App\Libs\Configs\StatusConfig::CONST_AVAILABLE }}" 
					        	                                    @if (statusAvailable(old('status')) || statusAvailable(old('status')))
																		checked
					        	                                    @endif
					        	                                    checked 
					        	                                    >
					        	                                    <label for="AVAILABLE"> Hoạt động</label>
					        	
					        	                                    <input id="DISABLE" class="magic-radio" type="radio" name="status" value="{{ App\Libs\Configs\StatusConfig::CONST_DISABLE }}"
				            	                                    @if (statusDisable(old('status')))
				    													checked
				            	                                    @endif>
					        	                                    <label for="DISABLE"> Không hoạt động</label>
					        	                                </div>
					        	                        	</div>
					                                	</div>
					                            	</div>
				    		                    </div>
						                		
							                </div>
		                		        </div>
		                		    </div>
		                		    <button type="submit" class="btn btn-primary btn-block btn-form-submit"><i class="ti-save"></i></button>
		                		</form>
	                		</div>
	                	</div>
	                </div>
		        </div>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section ('myJs')
	
@endsection

@section ('myCss')
	
@endsection

