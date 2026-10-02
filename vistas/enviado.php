<?php
    $datosRecibidos = $_GET;
    unset($datosRecibidos['p']);
?>

<div class="bg-formas-container py-10 container-pad">

        <div class="formas-coloridas">
        <div class="forma-luz luz-roja"></div>
        <div class="forma-luz luz-verde"></div>
        <div class="forma-luz luz-azul"></div>
    </div>

    <div class="relative z-10 max-w-2xl mx-auto text-center">
        <h2 class="items-center text-3xl font-black text-slate-800">¡Consulta enviada!</h2>
        <p class="text-slate-500 text-sm mt-1">Gracias por contactarnos. Hemos recibido tu mensaje con éxito.</p>
    </div>

    <section class="relative z-10 py-6 max-w-2xl mx-auto">
        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-6 md:p-8 border border-slate-200/80 shadow-sm flex flex-col hover:shadow-md transition-all">
            
            <h2 class="text-lg font-bold text-slate-800 mb-4 border-b border-slate-200/80 pb-3">
                Resumen de tu solicitud
            </h2>

            <div class="space-y-4 divide-y divide-slate-100/80">
                <?php foreach ($datosRecibidos as $clave => $valor): ?>
                    <div class="pt-4 flex flex-col sm:flex-row sm:items-center gap-2">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3 py-1.5 rounded-full inline-block sm:w-1/3 text-center sm:text-left">
                            <?= htmlspecialchars(ucfirst(str_replace('_', ' ', $clave))); ?>
                        </span>
                        
                        <span class="text-slate-700 font-medium sm:w-2/3 break-words text-center sm:text-left">
                            <?= htmlspecialchars($valor); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mt-8 pt-5 border-t border-slate-100 flex items-center justify-center">
                <a href="index.php?p=inicio" 
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white text-m font-bold px-6 py-2.5 rounded-xl transition-colors shadow-sm">
                    Volver al inicio ★
                </a>
            </div>
        </div> 
    </section>

</div>