<?php
if (isset($_GET['p']) && $_GET['p'] === 'contacto') {
    ?>
    <input type="hidden" name="p" value="enviado" />
    <?php
}

$productoId = isset($_GET['producto_id']) ? $_GET['producto_id'] : null;

require_once "clases/Producto.php";

$productoSeleccionado = $productoId ? Producto::producto_id($productoId) : null;

$mensajePredeterminado = "";
if ($productoSeleccionado) {
    $mensajePredeterminado = "¡Hola! Quisiera consultar la disponibilidad del equipo '" . $productoSeleccionado->getNombre() . "' para alquilar proximamente.";
}

?>
<div class="bg-formas-container py-10 container-pad">

    <div class="formas-coloridas">
        <div class="forma-luz luz-roja"></div>
        <div class="forma-luz luz-verde"></div>
        <div class="forma-luz luz-azul"></div>
    </div>

    <div class="relative z-10 max-w-2xl mx-auto text-center mb-8">
        <h2 class="text-3xl font-black text-slate-800">Contacto</h2>
        <p class="text-slate-500 text-sm mt-1">Escribinos y te responderemos a la brevedad</p>

        <?php if ($productoSeleccionado): ?>
            <div class="mb-6 p-4 bg-indigo-50/80 rounded-2xl border border-indigo-100 flex items-center gap-4">
                <div
                    class="w-14 h-14 bg-white rounded-xl p-1 shrink-0 border border-indigo-100 flex items-center justify-center">
                    <img src="imagenes/<?= $productoSeleccionado->getImagen(); ?>"
                        alt="<?= $productoSeleccionado->getNombre(); ?>" class="w-full h-full object-contain">
                </div>
                <div>
                    <span
                        class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-100/80 px-2 py-0.5 rounded-full">
                        Consulta por equipo
                    </span>
                    <h3 class="text-sm font-bold text-slate-800 mt-1">
                        <?= $productoSeleccionado->getNombre(); ?>
                    </h3>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <section class="relative z-10 max-w-2xl mx-auto">
        <form action="index.php" method="GET"
            class="bg-white/80 backdrop-blur-md rounded-3xl p-6 md:p-8 border border-slate-200/80 shadow-sm flex flex-col gap-5 hover:shadow-md transition-all">

            <input type="hidden" name="p" value="enviado" />

            <h2 class="text-xl font-bold text-slate-800 border-b border-slate-200/80 pb-3 mb-2">
                Pedinos la disponibilidad
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="flex flex-col gap-1.5">
                    <label for="nombre"
                        class="text-[11px] font-bold uppercase tracking-wider text-slate-600 after:ml-0.5 after:text-red-500 after:content-['*']">
                        Nombre
                    </label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required
                        class="w-full bg-white/50 border border-slate-300 text-slate-700 text-sm rounded-xl p-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="apellido"
                        class="text-[11px] font-bold uppercase tracking-wider text-slate-600 after:ml-0.5 after:text-red-500 after:content-['*']">
                        Apellido
                    </label>
                    <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" required
                        class="w-full bg-white/50 border border-slate-300 text-slate-700 text-sm rounded-xl p-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div class="flex flex-col gap-1.5">
                    <label for="email"
                        class="text-[11px] font-bold uppercase tracking-wider text-slate-600 after:ml-0.5 after:text-red-500 after:content-['*']">
                        Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="ejemplo@davinci.edu.ar" required
                        class="w-full bg-white/50 border border-slate-300 text-slate-700 text-sm rounded-xl p-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="telefono"
                        class="text-[11px] font-bold uppercase tracking-wider text-slate-600 after:ml-0.5 after:text-red-500 after:content-['*']">
                        Número de teléfono
                    </label>
                    <input type="tel" id="telefono" name="telefono" maxlength="10" placeholder="11-1234-5678" required
                        class="w-full bg-white/50 border border-slate-300 text-slate-700 text-sm rounded-xl p-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all">
                </div>
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="motivo"
                    class="text-[11px] font-bold uppercase tracking-wider text-slate-600 after:ml-0.5 after:text-red-500 after:content-['*']">
                    Motivo de la consulta
                </label>
                <select id="motivo" name="motivo" required
                    class="w-full bg-white/50 border border-slate-300 text-slate-700 text-sm rounded-xl p-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all appearance-none cursor-pointer">
                    <option value="" disabled selected>Seleccioná una opción...</option>
                    <option value="Disponibilidad">Consultar disponibilidad de equipos</option>
                    <option value="Presupuesto">Pedir presupuesto por varios días</option>
                    <option value="Soporte">Soporte técnico</option>
                    <option value="Otro">Otro motivo</option>
                </select>
            </div>

            <div class="flex flex-col gap-1.5">
                <label for="comentario"
                    class="text-[11px] font-bold uppercase tracking-wider text-slate-600 after:ml-0.5 after:text-red-500 after:content-['*']">
                    Comentario adicional
                </label>
                <textarea id="comentario" rows="3" name="comentario"
                    placeholder="Escribí acá el detalle de tu consulta..." required
                    class="w-full bg-white/50 border border-slate-300 text-slate-700 text-sm rounded-xl p-3 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all resize-y"></textarea>
            </div>

            <div class="mt-4 pt-2 border-t border-slate-100/80">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-base font-bold px-6 py-3.5 rounded-xl transition-colors shadow-sm flex justify-center items-center gap-2">
                    Enviar Consulta ★
                </button>
            </div>
        </form>
    </section>
</div>