<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SimpleCheckbox extends Component
{
    /**
     * チェックボックスの名前属性
     *
     * @var string
     */
    public $name;

    /**
     * チェックボックスの値
     *
     * @var mixed
     */
    public $value;

    /**
     * チェックされているかどうか
     *
     * @var bool
     */
    public $checked;

    /**
     * コンポーネントインスタンスの作成
     *
     * @param string $name
     * @param mixed $value
     * @param bool $checked
     * @return void
     */
    public function __construct($name, $value = null, $checked = false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->checked = $checked;
    }

    /**
     * コンポーネントを表すビューを取得
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.simple-checkbox');
    }
}