@extends('layouts.master')
@section('content')
<section class="content-header">
          <h1>
            Ödeme Raporları
            <small>Ödeme raporlarınızı tarih bazlı alabilirsiniz.</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="#" class="active">Ödeme Raporları</a></li>
          </ol>
        </section>
<!-- Main content -->
<section class="content">

@if(!isset($report))
  <div class="box box-primary">
	<div class="box-header">
	  <h3 class="box-title">Raporlar</h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<form role="form" action="/reports/payments" method="post">
	{!! csrf_field() !!}
	  <div class="box-body">
		
		<div class="form-group">
			<label>Tarihler:</label>
			<div class="input-group">
			  <div class="input-group-addon">
				<i class="fa fa-calendar"></i>
			  </div>
			  <input type="text" class="form-control pull-right" id="bastarih" name="baslangic" placeholder="Başlangıç Tarihi"/>
			  <input type="text" class="form-control pull-right" id="bittarih" name="bitis" placeholder="Bitiş Tarihi" />
			</div><!-- /.input group -->
		  </div><!-- /.form group -->
		<div class="form-group">
		  <label for="exampleInputPassword1">Müşteri</label>
		  {!! Form::select('musteri',array(''=>'Müşteri Seçiniz')+DB::table('users')->where('firma_id',Session::get('firma'))->lists('name','id'),Input::old('musteri',''),['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Kullanıcı</label>
		  {!! Form::select('kullanici',array(''=>'Tümü')+DB::table('users')->where('firma_id',Session::get('firma'))->where('tip',1)->lists('name','id'),Input::old('kullanici',''),['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Sırala</label>
		  {!! Form::select('sirala',array(''=>'Sıralama Seçebilirsiniz','tarihasc'=>'Tarih A-Y','tarihdesc'=>'Tarih Y-A','tutarasc'=>'Tutar 0-9','tutardesc'=>'Tutar 9-0'),'',['class'=>'form-control']) !!}
		</div>
	  </div><!-- /.box-body -->
	  <div class="box-footer">
		<button type="submit" class="btn btn-primary">Raporla</button>
	  </div>
	</form>
  </div><!-- /.box -->
@else
  <div class="box box-primary">
	<div class="box-header">
	  <h3 class="box-title">Raporlar</h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<div class="box-body table-responsive no-padding">
	  <table class="table table-hover">
		<tr>
		  <th>Tarih</th>
		  <th>Tip</th>
		  <th>Müşteri</th>
		  <th>Açıklama</th>
		  <th>Tutar</th>
		</tr>
		<?php $toplam=0;$i=0;?>
		@if(count($report)>0)
			@foreach($report as $value)
			<tr>
			  <td>{{date('d-m-Y H:i',strtotime($value->tarih))}}</td>
			  <td>{{$value->tip}}</td>
			  <td>{{\DB::table('users')->find($value->musteri_id)->name}}</td>
			  <td>{{$value->aciklama}}</td>
			  <td>{{str_replace('-','',$value->tutar)}} TL</td>
			</tr>
			<?php $toplam=$toplam+$value->tutar;
			$i++;
			?>
			@endforeach
		@endif
		<tr>
		  <td>{{$i}} adet kayıt bulunmuştur...</td>
		  <td colspan="3"><p align="right"><strong>Toplam:</strong></a></td>
		  <td>{{number_format(str_replace('-','',$toplam),2)}} TL</td>
		</tr>
	  </table>
	</div><!-- /.box-body -->
	<div class="box-footer"></div>
  </div><!-- /.box -->	
@endif	
  
</section><!-- /.content -->
@endsection
@section('js')
<script>
$(function () {
	$('#bastarih').datepicker();
	$('#bittarih').datepicker();
});
</script>
@endsection