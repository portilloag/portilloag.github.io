<?php

class Producto
{
    private $id;
    private $nombre;
    private $categoria;
    private $precio;
    private $descripcion;
    private $imagen;
    private $stock;
    private $fechaIngreso;
    private $destacado;

    //GETTERS

    /**
     * Obtiene el id de Producto
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Obtiene el nombre de Producto
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Obtiene la categoria de Producto
     */
    public function getCategoria(): string
    {
        return $this->categoria;
    }

    /**
     * Obtiene el precio de Producto
     */
    public function getPrecio(): int
    {
        return $this->precio;
    }

    /**
     * Obtiene la descripcion de Producto
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * Obtiene la imagen de Producto
     */
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * Obtiene el stock de Producto
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * Obtiene la fecha de ingreso de Producto
     */
    public function getFechaIngreso(): string
    {
        return $this->fechaIngreso;
    }

    /**
     * Obtiene el destacado de Producto
     */
    public function getDestacado(): bool
    {
        return $this->destacado;
    }

    //SETTERS

    /**
     * Setea el id de Producto
     * @param int $dato id del producto
     */
    public function setId(int $dato)
    {
        $this->id = $dato;
    }

    /**
     * Setea el nombre de Producto
     * @param string $dato nombre del producto
     */
    public function setNombre(string $dato)
    {
        $this->nombre = $dato;
    }

    /**
     * Setea la categoria de Producto
     * @param string $dato categoria del producto
     */
    public function setCategoria(string $dato)
    {
        $this->categoria = $dato;
    }

    /**
     * Setea el precio de Producto
     * @param int $dato precio del producto
     */
    public function setPrecio(int $dato)
    {
        $this->precio = $dato;
    }

    /**
     * Setea la descripcion de Producto
     * @param string $dato descripcion del producto
     */
    public function setDescripcion(string $dato)
    {
        $this->descripcion = $dato;
    }

    /**
     * Setea la imagen de Producto
     * @param string $dato imagen del producto
     */
    public function setImagen(string $dato)
    {
        $this->imagen = $dato;
    }

    /**
     * Setea el stock de Producto
     * @param int $dato stock del producto
     */
    public function setStock(int $dato)
    {
        $this->stock = $dato;
    }

    /**
     * Setea la fecha de ingreso de Producto
     * @param string $dato fecha de ingreso del producto
     */
    public function setFechaIngreso(string $dato)
    {
        $this->fechaIngreso = $dato;
    }

     /**
     * Setea el destacado de Producto
     * @param bool $dato destacado del producto
     */
    public function setDestacado(bool $dato)
    {
        $this->destacado = $dato;
    }

    //Para que aparezcan los productos

    public static function catalogo_completo(): array
    {
        $catalogo = [];

        $JSON = file_get_contents('data/productos.json');

        $JSONData = json_decode($JSON);

        foreach ($JSONData as $value) {
            $producto = new self();

            $producto->id = $value->id;
            $producto->nombre = $value->nombre;
            $producto->categoria = $value->categoria;
            $producto->descripcion = $value->descripcion;
            $producto->precio = $value->precio;
            $producto->imagen = $value->imagen;
            $producto->stock = $value->stock;
            $producto->fechaIngreso = ($value->fechaIngreso);
            $producto->destacado = $value->destacado;

            $catalogo[] = $producto;
        }
        return $catalogo;
    }

    public static function catalogo_carrera(string $categoria): array
    {
        $resultado = [];
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $c){
            if($c->categoria == $categoria){
            $resultado[] = $c;
            }
        }
        return $resultado;
    }

    public static function catalogo_fecha(string $fechaFiltro): array
    {
        $resultado = [];
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $producto) {
            $date = $producto->getFechaIngreso();

            $fecha = substr($date, 0, 4);

            if ($fecha === $fechaFiltro) {
                $resultado[] = $producto;
            }
        }

        return $resultado;
    }

    public static function catalogo_stock():array
    {
        $resultado = [];
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $producto) {
            if($producto->getStock() > 0){
                $resultado[] = $producto;
            }
        }
        return $resultado;
    }

    public static function destacados():array
    {
        $resultado = [];
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $producto) {
            if($producto->getDestacado() === true){
                $resultado[] = $producto;
            }
        }
        return $resultado;
    }

    public static function producto_id(int $id): ?Producto
    {
        $catalogo = self::catalogo_completo();

        foreach ($catalogo as $p) {
            if ($p->id == $id) {
                return $p;
            }
        }
        return null;
    }
}
