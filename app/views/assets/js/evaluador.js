document.addEventListener('DOMContentLoaded', function()
{
    const input = document.getElementById('password_test');
    const medidor = document.getElementById('medidor');

    if (!input || !medidor) return;

    input.addEventListener('input', function()
    {
        const pass = input.value;
        const resultado = analizarPassword(pass);

        medidor.style.display = 'block';
        document.getElementById('medidor-barra').style.width = resultado.score + '%';
        document.getElementById('medidor-barra').style.background = resultado.color;
        document.getElementById('medidor-score').textContent = resultado.score + '/100';
        document.getElementById('medidor-score').style.color = resultado.color;
        document.getElementById('medidor-nivel').textContent = resultado.nivel;
        document.getElementById('medidor-nivel').style.color = resultado.color;

        const recsEl = document.getElementById('medidor-recs');
        recsEl.innerHTML = '';
        resultado.recs.forEach(function(rec)
        {
            const div = document.createElement('div');
            div.className = 'rec';
            div.textContent = rec;
            recsEl.appendChild(div);
        });
    });
});

function analizarPassword(pass)
{
    let score = 0;
    let recs = [];

    if (pass.length >= 8)
    {
        score += 25;
    }
    else
    {
        recs.push('Aumenta el tamaño a 8 o más caracteres.');
    }

    if (/[A-Z]/.test(pass))
    {
        score += 25;
    }
    else
    {
        recs.push('Incluye al menos una letra en mayúscula (A-Z).');
    }

    if (/[0-9]/.test(pass))
    {
        score += 25;
    }
    else
    {
        recs.push('Agrega dígitos numéricos (0-9).');
    }

    if (/[\W]/.test(pass))
    {
        score += 25;
    }
    else
    {
        recs.push('Usa símbolos como @, #, $, etc.');
    }

    let color = '#ef4444';
    let nivel = 'Alto riesgo';
    if (score >= 50) { color = '#f59e0b'; nivel = 'Riesgo medio'; }
    if (score >= 75) { color = '#22c55e'; nivel = 'Bajo riesgo'; }

    return { score, color, nivel, recs };
}