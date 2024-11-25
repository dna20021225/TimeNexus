@props(['name', 'label', 'items'])

<select name={{$name}} class="w-[230px] rounded-lg border border-gray-300 shadow-sm p-2 bg-neutral-50">
    <option value="">{{$label}}</option>
      @foreach($items as $id => $item)
          <option value="{{ $id }}">{{ $item }}</option>
      @endforeach
  </select>