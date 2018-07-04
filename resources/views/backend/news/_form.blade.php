{{ Form::open(array('url' => $route)) }}

      @if(isset($news))
        {{ method_field('put') }}
      @endif

      @component('layouts.backend.components.form_header_box')
        @slot('open_attachment') true @endslot
        @slot('attachment') {{ route('admin.news.index') }} @endslot
        @slot('back') {{ route('admin.news.index') }} @endslot
      @endcomponent

    <div class="form-group">
      <label for="title"><h4>標題:</h4></label>
      @if(!empty($news->title))
        @php($title = $news->title)
      @else
        @php($title = old('title'))
      @endif
      {{ Form::input('text', 'title', $title, ['class'=> 'form-control', 'placeholder' => '最新消息標題']) }}
    </div>
    <div class="form-group">
      <label><h4>內容:</h4></label>
      <textarea id="summernote" name="content">
        @if(!empty($content))
          {{ $content }}
        @endif
      </textarea>
    </div>
    <div class="form-group">
      <label>排序:</label>
      @if(!empty($news->rank))
        @php($rank = $news->rank)
      @else
        @php($rank = old('rank'))
      @endif
      {{ Form::selectRange('rank', 1, $number_news, $rank, ['class' => 'form-control']) }}
    </div>
    <div class="form-group form-check">
      @if(!empty($news->status))
        @php($status = ($news->status == '1')? true:false)
      @else
        @php($status = old('status'))
      @endif      
      {{ Form::checkbox('status', 1, $status, ['class' => 'form-check-input']) }}
      <label class="form-check-label" for="exampleCheck1">發布?</label>
    </div>
{{ Form::close() }}

@component('layouts.backend.components.modal')
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">附件上傳</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="alert alert-danger attachment-form-alert-box" role="alert"></div>
      <form class="attachment-form" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ Form::file('file', ['class' => 'form-control']) }}
      </form>
      <hr>
      <input type="hidden" class="current_page" value="1">
      <div class="d-flex flex-row flex-wrap attachments-viewer">
      </div>
      <div class="pagination-bar"></div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
      <button type="button" class="btn btn-primary btn-attachment-save">儲存</button>
    </div>
@endcomponent