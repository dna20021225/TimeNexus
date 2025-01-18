@props([
    'type' => null,
    'label' => null,
    'selected' => 'option1', // デフォルト値を設定
])

<div class="flex items-center space-x-4">
    @if($label)<label class="text-2xl">{{ $label }}</label>@endif
    
    @if($type === 'toggle')
    <select 
        class="pl-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow cursor-pointer w-[100px] bg-neutral-200 hover:shadow-md focus:outline-none"
        {{ $attributes }}
    >
        <option value="" {{ $selected === '' ? 'selected' : '' }}></option>
        <option value="代休" {{ $selected === '代休' ? 'selected' : '' }}>代休</option>
        <option value="年次有給休暇" {{ $selected === '年次有給休暇' ? 'selected' : '' }}>年次有給休暇</option>
        <option value="慶事休暇" {{ $selected === '慶事休暇' ? 'selected' : '' }}>慶事休暇</option>
        <option value="弔慰休暇" {{ $selected === '弔慰休暇' ? 'selected' : '' }}>弔慰休暇</option>
        <option value="赴任休暇" {{ $selected === '赴任休暇' ? 'selected' : '' }}>赴任休暇</option>
        <option value="罹災休暇" {{ $selected === '罹災休暇' ? 'selected' : '' }}>罹災休暇</option>
        <option value="生理休暇" {{ $selected === '生理休暇' ? 'selected' : '' }}>生理休暇</option>
        <option value="フレックス休暇" {{ $selected === 'フレックス休暇' ? 'selected' : '' }}>フレックス休暇</option>
        <option value="誕生日休暇" {{ $selected === '誕生日休暇' ? 'selected' : '' }}>誕生日休暇</option>
        <option value="半日有給休暇" {{ $selected === '半日有給休暇' ? 'selected' : '' }}>半日有給休暇</option>
        <option value="看護休暇" {{ $selected === '看護休暇' ? 'selected' : '' }}>看護休暇</option>
        <option value="出産休暇" {{ $selected === '出産休暇' ? 'selected' : '' }}>出産休暇</option>
    </select>
    @elseif($type === 'Mtime')
    <input 
        class="p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow cursor-pointer w-[100px] bg-neutral-200 hover:shadow-md focus:outline-none"
        placeholder="133:00"
        {{ $attributes }}
    >
    @elseif($type === 'Dtime')
    <input 
        class="p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow cursor-pointer w-[100px] bg-neutral-200 hover:shadow-md focus:outline-none"
        placeholder="8:00"
        {{ $attributes }}
    >
    @elseif($type === 'date')
    <input 
        class="p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow cursor-pointer w-[100px] bg-neutral-200 hover:shadow-md focus:outline-none"
        placeholder="30"
        {{ $attributes }}
    >
    @elseif($type === null)
    <input 
        class="p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow cursor-pointer w-[100px] bg-neutral-200 hover:shadow-md focus:outline-none"
        placeholder="00:00"
        {{ $attributes }}
    >
    @endif
</div>