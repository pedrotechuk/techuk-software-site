# Publicar no Railway

O site não usa banco de dados. O Railway constrói a imagem com o `Dockerfile` e confere a saúde em `/up`.

## 1. Subir o código
1. Crie um repositório no GitHub (privado) e envie esta pasta (`git push`).
2. O arquivo `.env` **não** vai para o Git (já está no `.gitignore`).

## 2. Criar o serviço
1. Em railway.com: **New Project > Deploy from GitHub repo** e escolha o repositório.
2. O Railway lê o `railway.json` e usa o `Dockerfile` sozinho.

## 3. Variáveis (aba Variables)
| Variável | Valor |
|---|---|
| `APP_KEY` | rode `php artisan key:generate --show` localmente e cole o resultado |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | `https://techuksoftware.com.br` (ou a URL do Railway enquanto o domínio não existe) |
| `APP_LOCALE` | `pt_BR` |
| `SESSION_DRIVER` / `CACHE_STORE` | `file` / `file` |
| `GA4_ID` | opcional, ex.: `G-XXXXXXXXXX` |
| `META_PIXEL_ID` | opcional |
| `LEGAL_DRAFT_NOTICE` | `false` só depois da revisão jurídica das páginas legais |

## 4. Domínio techuksoftware.com.br
1. Registre o domínio (registro.br).
2. No Railway: **Settings > Networking > Custom Domain**, informe `techuksoftware.com.br` e também `www.techuksoftware.com.br`.
3. Crie no DNS os registros que o Railway mostrar (CNAME para `www`; para o domínio raiz use ALIAS/ANAME ou CNAME flattening, ou o IP indicado).
4. Aguarde o certificado HTTPS (automático). Depois ajuste `APP_URL` para `https://techuksoftware.com.br` e reimplante.

## 5. Conferir
- `https://SEU-DOMINIO/up` responde 200.
- `https://SEU-DOMINIO/sitemap.xml` e `/robots.txt` mostram o domínio correto.
- Teste um botão de WhatsApp e, com ID de GA4/Pixel, o aviso de cookies (os scripts só carregam após "Aceitar").

## Editar conteúdo
Textos, preços, FAQ, segmentos, contatos, redes sociais, CNPJ e projetos ficam em `config/techuk.php`. Prints de projetos: coloque em `public/img/projetos/` e informe o caminho em `projetos.itens[].imagem`.
