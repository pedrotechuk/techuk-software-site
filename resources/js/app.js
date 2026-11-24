/* JavaScript minimo da landing page da Techuk. Sem dependencias. */

const CHAVE_CONSENTIMENTO = 'techuk_consentimento';

/* ---------- Armazenamento seguro (pode estar bloqueado no navegador) ---------- */
function lerConsentimento() {
    try {
        return window.localStorage.getItem(CHAVE_CONSENTIMENTO);
    } catch (e) {
        return null;
    }
}

function gravarConsentimento(valor) {
    try {
        window.localStorage.setItem(CHAVE_CONSENTIMENTO, valor);
    } catch (e) {
        /* sem armazenamento: a escolha vale so ate fechar a pagina */
    }
}

/* ---------- Medicao (so depois do consentimento e so se houver ID) ---------- */
let config = { ga4: null, pixel: null };
try {
    config = JSON.parse(document.getElementById('techuk-config').textContent) || config;
} catch (e) {
    /* config ausente: nada e carregado */
}

let medicaoAtiva = false;

function carregarScript(src) {
    const s = document.createElement('script');
    s.async = true;
    s.src = src;
    document.head.appendChild(s);
}

function ativarMedicao() {
    if (medicaoAtiva) return;
    medicaoAtiva = true;

    if (config.ga4) {
        window.dataLayer = window.dataLayer || [];
        window.gtag = function () { window.dataLayer.push(arguments); };
        window.gtag('js', new Date());
        window.gtag('config', config.ga4);
        carregarScript('https://www.googletagmanager.com/gtag/js?id=' + encodeURIComponent(config.ga4));
    }

    if (config.pixel) {
        /* Snippet padrao do Meta Pixel, sem alteracoes de comportamento. */
        (function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () { n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments); };
            if (!f._fbq) f._fbq = n;
            n.push = n; n.loaded = true; n.version = '2.0'; n.queue = [];
            t = b.createElement(e); t.async = true; t.src = v;
            s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s);
        })(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        window.fbq('init', config.pixel);
        window.fbq('track', 'PageView');
    }
}

function registrarCliqueWhatsapp(origem, plano) {
    if (!medicaoAtiva) return;
    const dados = { origem: origem || 'desconhecida' };
    if (plano) dados.plano = plano;

    if (config.ga4 && window.gtag) window.gtag('event', 'whatsapp_click', dados);
    if (config.pixel && window.fbq) window.fbq('track', 'Contact', dados);
}

document.addEventListener('click', (ev) => {
    const alvo = ev.target.closest('a[data-wa]');
    if (alvo) registrarCliqueWhatsapp(alvo.dataset.origem, alvo.dataset.plano);
});

/* ---------- Aviso de cookies ---------- */
const caixaCookies = document.getElementById('cookies');

function mostrarCookies() {
    if (caixaCookies) caixaCookies.classList.add('aberto');
}

function esconderCookies() {
    if (caixaCookies) caixaCookies.classList.remove('aberto');
}

function decidir(valor) {
    gravarConsentimento(valor);
    esconderCookies();
    if (valor === 'aceito') ativarMedicao();
}

if (caixaCookies) {
    caixaCookies.querySelectorAll('[data-cookies]').forEach((botao) => {
        botao.addEventListener('click', () => decidir(botao.dataset.cookies === 'aceitar' ? 'aceito' : 'recusado'));
    });
}

const botaoPreferencias = document.getElementById('abrir-cookies');
if (botaoPreferencias) botaoPreferencias.addEventListener('click', mostrarCookies);

const consentimentoSalvo = lerConsentimento();
if (consentimentoSalvo === 'aceito') {
    ativarMedicao();
} else if (consentimentoSalvo !== 'recusado') {
    setTimeout(mostrarCookies, 1200);
}

/* ---------- Cabecalho e menu ---------- */
const cabecalho = document.getElementById('cabecalho');
const menuBtn = document.getElementById('menu-btn');
const menuPainel = document.getElementById('menu-painel');

function atualizarCabecalho() {
    if (!cabecalho || cabecalho.dataset.fixo === '1') return;
    cabecalho.classList.toggle('rolado', window.scrollY > 24 || (menuPainel && menuPainel.classList.contains('aberto')));
}

if (cabecalho && cabecalho.classList.contains('rolado')) cabecalho.dataset.fixo = '1';
window.addEventListener('scroll', atualizarCabecalho, { passive: true });
atualizarCabecalho();

function fecharMenu() {
    if (!menuPainel || !menuBtn) return;
    menuPainel.classList.remove('aberto');
    menuBtn.setAttribute('aria-expanded', 'false');
    menuBtn.setAttribute('aria-label', 'Abrir menu');
    document.body.style.overflow = '';
    atualizarCabecalho();
}

if (menuBtn && menuPainel) {
    menuBtn.addEventListener('click', () => {
        const abrir = !menuPainel.classList.contains('aberto');
        menuPainel.classList.toggle('aberto', abrir);
        menuBtn.setAttribute('aria-expanded', String(abrir));
        menuBtn.setAttribute('aria-label', abrir ? 'Fechar menu' : 'Abrir menu');
        document.body.style.overflow = abrir ? 'hidden' : '';
        if (abrir) cabecalho.classList.add('rolado');
        else atualizarCabecalho();
    });
    menuPainel.querySelectorAll('a').forEach((a) => a.addEventListener('click', fecharMenu));
    document.addEventListener('keydown', (ev) => {
        if (ev.key === 'Escape') fecharMenu();
    });
}

/* ---------- Revelar ao rolar ---------- */
const reduzMovimento = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const itens = document.querySelectorAll('.rv');

if (reduzMovimento || !('IntersectionObserver' in window)) {
    itens.forEach((el) => el.classList.add('in'));
} else {
    const obs = new IntersectionObserver((entradas) => {
        entradas.forEach((e) => {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
    itens.forEach((el) => obs.observe(el));
}

/* ---------- WhatsApp flutuante: some quando ja ha um CTA grande na tela ---------- */
const flutuante = document.getElementById('wa-flutuante');
if (flutuante && 'IntersectionObserver' in window) {
    const visiveis = new Set();
    const alvos = document.querySelectorAll('.hero .btn, .cta-final .btn, .cookies.aberto');
    const obsWa = new IntersectionObserver((entradas) => {
        entradas.forEach((e) => (e.isIntersecting ? visiveis.add(e.target) : visiveis.delete(e.target)));
        flutuante.classList.toggle('oculto', visiveis.size > 0);
    });
    alvos.forEach((el) => obsWa.observe(el));
}
