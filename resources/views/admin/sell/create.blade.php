@extends('admin.Tadmin.master')

@section('tittle', 'Jual Sampah')

@section('content')
<form role="form" action="{{ route('sell.store', $collector->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">No Rekening  : <h5>{{$collector->no_rek}}</h5></li>
          <li class="list-group-item">Nama Perusahaan : <h5>{{$collector->company_name}}</h5></li>
          <li class="list-group-item">Nama Pengepul : <h5>{{$collector->collector_name}}</h5></li>
        </ul>
      </div>
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="trash">Sampah</label>
                    <select name="trash_id" class="form-control" id="trash">
                     <option value="" selected disabled hidden>PIlIH</option>
                      @forelse ($trashes as $trash)
                      @if ($trash->amount>0)
                      <option value="{{ $trash->id}}">{{ $trash->trash_name}}
                      (Rp. {{number_format($trash->trash_price)}})</option>
                      @endif
                      @empty

                      @endforelse
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="amount_sell">Jumlah</label>
                    <input type="number" class="form-control" placeholder="0,0" id="totalAmt" step="0.1" name="amount_sell" id="amount_sell"
                    value="{{ old('amount_sell')}}"></input>
                    @error('amount_sell')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>
    </div>
    <div class="ml-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection

{{-- @push('script')
<script>
    $(document).ready(function () {
        var url = "{{ url('add-remove-input-fields') }}";
        var i = 1;
        $('#add').click(function () {
            var trash = $("#trash").val();
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><select name="trash_id" class="form-control id="trash" value="'+trash+'"><option value="">PILIH<option></select></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submit').click(function () {
            $.ajax({
                url: "{{ url('add-remove-input-fields') }}",
                method: "POST",
                data: $('#add_name').serialize(),
                type: 'json',
                success: function (data) {
                    if (data.error) {
                        display_error_messages(data.error);
                    } else {
                        i = 1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".show-success-message").find("ul").html('');
                        $(".show-success-message").css('display', 'block');
                        $(".show-error-message").css('display', 'none');
                        $(".show-success-message").find("ul").append('<li>Todos Has Been Successfully Inserted.</li>');
                    }
                }
            });
        });

        function display_error_messages(msg) {
            $(".show-error-message").find("ul").html('');
            $(".show-error-message").css('display', 'block');
            $(".show-success-message").css('display', 'none');
            $.each(msg, function (key, value) {
                $(".show-error-message").find("ul").append('<li>' + value + '</li>');
            });
        }
    });
</script>
@endpush --}}