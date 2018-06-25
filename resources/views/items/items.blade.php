@if ($items)
    <div class="row">
        @foreach ($items as $key => $item)
            <div class="item">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $item->image_url }}" alt="" class="">
                        </div>
                        <div class="panel-body">
                            @if ($item->id)
                                <p class="item-title"><a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a></p>
                            @else
                                <p class="item-title">{{ $item->name }}</p>
                            @endif
                            <div class="buttons text-center">
                                @if (Auth::check())
                                    @if($destinction == "")
                                        @include('items.want_button', ['item' => $item])
                                        @include('items.have_button', ['item' => $item])
                                    @elseif($destinction == "want")
                                        @include('items.want_button', ['item' => $item])
                                    @else
                                        @include('items.have_button', ['item' => $item])
                                    @endif
                                @endif
                            </div>
                        </div>
                        @if (isset($item->count))
                            <div class="panel-footer">
                                @if($destinction == "")
                                        @include('items.want_button', ['item' => $item])
                                        @include('items.have_button', ['item' => $item])
                                @elseif($destinction == "want")
                                    <p class="text-center">{{ $key+1 }}位: {{ $item->count}} Wants</p>
                                @else
                                    <p class="text-center">{{ $key+1 }}位: {{ $item->count}} Haves</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif