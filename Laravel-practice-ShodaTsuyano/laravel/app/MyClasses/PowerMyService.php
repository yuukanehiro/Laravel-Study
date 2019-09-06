<?php

namespace App\MyClasses;

class PowerMyService implements MyServiceInterface
{
  private $id = -1;
  private $msg = 'no id...';
  private $data = ['いちご', 'りんご', 'ばなな', 'みかん', 'ぶどう'];

  public function __construct()
  {
      $this->setId(rand(0, count($this->data)));
  }

  public function setId($id)
  {
    if ($id >= 0 && $id < count($this->data)) {
      $this->msg = "select id:" . $id . "番の" . $this->data[$id] . 'ですね！';
    }
  }

  public function say()
  {
    return $this->msg;
  }

  public function data(int $id)
  {
    return $this->data[$id];
  }

  public function setData($data)
  {
      $this->data = $data;
  }

  public function alldata()
  {
    return $this->data;
  }
}
