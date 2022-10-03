@extends('layouts.admin')

@section('title')
    <title>Thêm câu hỏi</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Ngân hàng câu hỏi', 'key' => 'Thêm mới'])
        <!-- /.content-header -->

        <!-- Main content -->
        <form action="{{ route('question.store') }}" method="POST" id="app" style="padding-left: 8px">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                        
                            @csrf
                            <div class="mb-3">
                                <i>Chú ý: Các trường có <span style="color: red">*</span> không được để trống !</i>
                            </div>
                            <div class="mb-3">
                                <div><label>Thể loại câu hỏi <span style="color: red">*</span></label></div>
                                <select name="type" @change="selectType()" v-model="type"
                                        class="form-control  @error('type') is-invalid @enderror">
                                    <option value="">Chọn loại câu hỏi</option>
                                    <option value="1" {{ old('type')==1 ? 'selected':null }}>Câu hỏi trắc nghiệm đúng|sai</option>
                                    <option value="2" {{ old('type')==2 ? 'selected':null }}>Câu hỏi trắc nghiệm 1 lựa chọn</option>
                                    <option value="3" {{ old('type')==3 ? 'selected':null }}>Câu hỏi trắc nghiệm nhiều lựa chọn</option>
                                </select>
                               
                                @error('type')
                                    <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                @enderror                            
                            </div>

                            <div class="mb-3">
                                <label>Nội dung câu hỏi <span style="color: red">*</span></label>
                                <input type="text" 
                                    class="form-control @error('content') is-invalid @enderror" 
                                    name="content" placeholder="Nội dung ..."
                                    value="{{ old('content') }}">
                                    @error('content')
                                        <div class="invalid-feedback invalid-font-size">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div v-if="type != 0">
                                <label>Đáp Án</label>
                                <div class="mb-3" v-if="type==1">
                                    <input name="answer_correct" type="radio" id="yes" value="1" />
                                    <label for="yes">Yes</label>
                                    <input name="answer_correct" type="radio" id="no" value="0" />
                                    <label for="no">No</label>
                                    
                                </div>
                                <div class="mb-3" v-if="type==2">
                                    <div>
                                        <input type="radio" name="answer_correct" value="0"/>
                                        <input type="text" name="answer[]" style="width: 90%; display: inline-block; margin: 5px 0px" class="form-control"/>
                                    </div>
                                    <div>
                                        <input type="radio" name="answer_correct" value="1"/>
                                        <input type="text" name="answer[]" style="width: 90%; display: inline-block; margin: 5px 0px" class="form-control"/>
                                    </div>
                                    <div>
                                        <input type="radio" name="answer_correct" value="2"/>
                                        <input type="text" name="answer[]" style="width: 90%; display: inline-block; margin: 5px 0px" class="form-control"/>
                                    </div>
                                    <div>
                                        <input type="radio" name="answer_correct" value="3"/>
                                        <input type="text" name="answer[]" style="width: 90%; display: inline-block; margin: 5px 0px" class="form-control"/>
                                    </div>
                                </div>
                                <div class="mb-3" v-if="type==3">
                                    <div>
                                        <input type="checkbox" name="answer_correct[]" value="0"/>
                                        <input type="text" name="answer[]" style="width: 90%; display: inline-block; margin: 5px 0px" class="form-control"/>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="answer_correct[]" value="1"/>
                                        <input type="text" name="answer[]" style="width: 90%; display: inline-block; margin: 5px 0px" class="form-control"/>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="answer_correct[]" value="2"/>
                                        <input type="text" name="answer[]" style="width: 90%; display: inline-block; margin: 5px 0px" class="form-control"/>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="answer_correct[]" value="3"/>
                                        <input type="text" name="answer[]" style="width: 90%; display: inline-block; margin: 5px 0px" class="form-control"/>
                                    </div>
                                </div>
                                <div class="mb-3" v-if="type==4">
                                    <textarea name="answer_correct" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </form>
        <!-- /.content -->
    </div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script>
    var app = new Vue({
    el: "#app",
    data: {
      msg: "Vuejs Example with CDN",
      type: "{{ old('type', 0) }}",
    },
    methods: {
        selectType() {
            console.log(this.type);
        }
    },
  });
</script>
@endsection
