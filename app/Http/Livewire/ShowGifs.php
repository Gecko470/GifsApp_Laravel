<?php

namespace App\Http\Livewire;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ShowGifs extends Component
{
    public $datos, $termino;
    private Response $respuesta;
    public $readyToLoad = false;
    public string $res;
    public $historial = [];

    private $busquedasInicio = ['hero', 'marvel', 'comic', 'fiction'];

    public function mount()
    {
        $this->termino = $this->busquedasInicio[rand(0, 3)];
        $this->buscar();
    }

    public function loadGifs()
    {
        $this->readyToLoad = true;
    }

    public function search($item)
    {
        $this->termino = $item;
        $this->buscar();
    }

    public function buscar()
    {

        $this->respuesta = Http::get("http://api.giphy.com/v1/gifs/search?mi_api_key&q=" . $this->termino . "&limit=45");
        $this->datos = $this->respuesta->json();

        if ($this->datos["data"] == []) {
            $this->res = "0";
        } else {
            $this->res = "1";
            if (!in_array($this->termino, $this->historial)) {
                array_unshift($this->historial, $this->termino);
            }
        }
    }

    public function render()
    {
        return view('livewire.show-gifs');
    }
}
