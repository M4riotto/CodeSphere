// -----------------------------
// Config / Endpoints
// -----------------------------
const API = {
    CREATE: "/codesphere/app/routes/create_course_full.php",
    LIST: "/codesphere/app/routes/getCourses.php",
    GET_ONE: "/codesphere/app/routes/getCourseById.php",
};

// -----------------------------
// DOM Cache (inputs e ações principais)
// -----------------------------
const el = {
    // Formulário de criação
    title: document.getElementById("titleInput"),
    category: document.getElementById("categorySelect"),
    description: document.getElementById("descriptionInput"),
    price: document.getElementById("priceInput"),
    level: document.getElementById("levelSelect"),
    image: document.getElementById("imageInput"),
    thumbnailUrl: document.getElementById("thumbnailUrlInput"),
    publishBtn: document.getElementById("publishBtn"),
    draftBtn: document.getElementById("draftBtn"),

    // Builder de módulos/aulas
    modulesWrap: document.getElementById("modulesContainer"),
    addModuleBtn: document.getElementById("addModuleBtn"),

    // Lista de cursos / busca
    grid: document.getElementById("coursesGrid"),
    emptyState: document.getElementById("emptyState"),
    search: document.getElementById("searchInput"),
    filterCat: document.getElementById("categorySelect"),

    // Accordion de detalhes (página de curso)
    accordion: document.getElementById("accordion"),
};

// -----------------------------
// Utils
// -----------------------------
const qs = (sel, root = document) => root.querySelector(sel);
const qsa = (sel, root = document) => Array.from(root.querySelectorAll(sel));

const toCents = (val) => {
    const n = parseFloat(String(val ?? "").replace(",", "."));
    return Number.isFinite(n) ? Math.round(n * 100) : 0;
};

const firstSentence = (text, max = 240) => {
    const t = (text || "").trim();
    if (!t) return null;
    const p = t.split(/(\.|\?|!)\s/)[0];
    return (p || t).slice(0, max);
};

const toggleLoading = (buttons, isLoading, label = "Enviando...") => {
    const arr = Array.isArray(buttons) ? buttons : [buttons];
    arr.forEach((b) => {
        if (!b) return;
        b.dataset.label ??= b.textContent;
        b.classList.toggle("opacity-60", isLoading);
        b.classList.toggle("pointer-events-none", isLoading);
        b.textContent = isLoading ? label : b.dataset.label;
    });
};

const debounce = (fn, delay = 300) => {
    let t;
    return (...args) => {
        clearTimeout(t);
        t = setTimeout(() => fn(...args), delay);
    };
};

const refreshIcons = () => {
    if (window.lucide?.createIcons) window.lucide.createIcons();
};

// -----------------------------
// Builder de Módulos e Aulas
// -----------------------------
let moduleSeq = 0;

const createLessonRow = (moduleId, lessonIndex) => {
    const row = document.createElement("div");
    row.className = "flex items-center gap-3";
    row.dataset.lessonId = `${moduleId}-${lessonIndex}`;

    row.innerHTML = `
      <input data-lesson-title type="text" placeholder="Aula ${lessonIndex}"
             class="flex-1 bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />

      <div class="relative">
        <select data-lesson-type
                class="appearance-none w-32 bg-background/50 rounded-2xl border border-border/60 px-3 py-2 pr-8 outline-none focus:ring-2 focus:ring-primary">
          <option value="video" selected>Vídeo</option>
          <option value="activity">Atividade</option>
          <option value="text">Texto</option>
        </select>
        <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 opacity-70"
             viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m6 9 6 6 6-6"/></svg>
      </div>

      <input data-lesson-duration type="number" min="0" placeholder="min"
             class="w-20 bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary"
             title="Duração em minutos"/>

      <button type="button" class="inline-flex items-center justify-center rounded-xl size-9 hover:bg-white/5 transition" title="Upload (opcional)">
        <i data-lucide="upload" class="h-4 w-4"></i>
      </button>

      <button type="button" data-remove-lesson
              class="inline-flex items-center justify-center rounded-xl size-9 hover:bg-white/5 transition text-destructive hover:text-destructive"
              title="Remover aula">
        <i data-lucide="x" class="h-4 w-4"></i>
      </button>
    `;

    // Remoção (delegada por atributo)
    row.addEventListener("click", (ev) => {
        if (ev.target.closest("[data-remove-lesson]")) row.remove();
    });

    return row;
};

const createModuleBox = (moduleId, labelIndex) => {
    const box = document.createElement("div");
    box.className = "p-4 rounded-lg bg-background/30 space-y-4";
    box.dataset.moduleId = moduleId;

    box.innerHTML = `
      <div class="flex items-start gap-4">
        <div class="flex-1 space-y-2">
          <label class="block text-sm">Módulo ${labelIndex}</label>
          <input data-module-title type="text" placeholder="Nome do módulo"
                 class="w-full bg-background/50 rounded-2xl border border-border/60 px-3 py-2 outline-none focus:ring-2 focus:ring-primary" />
        </div>
        <button type="button" data-remove-module
                class="inline-flex items-center justify-center rounded-xl size-9 hover:bg-white/5 transition text-destructive hover:text-destructive"
                title="Remover módulo">
          <i data-lucide="x" class="h-4 w-4"></i>
        </button>
      </div>

      <div class="pl-4 space-y-3" data-lessons></div>

      <button type="button" data-add-lesson
              class="inline-flex items-center rounded-2xl px-3 py-2 border border-border/60 hover:bg-white/5 text-sm w-full transition">
        <i data-lucide="plus" class="mr-2 h-4 w-4"></i>
        Adicionar Aula
      </button>
    `;

    const lessonsWrap = qs("[data-lessons]", box);
    lessonsWrap.appendChild(createLessonRow(moduleId, 1));

    // Eventos do módulo (delegação por data-atributos)
    box.addEventListener("click", (ev) => {
        if (ev.target.closest("[data-remove-module]")) {
            box.remove();
            renumberModules();
            return;
        }
        if (ev.target.closest("[data-add-lesson]")) {
            const nextIndex = qsa("[data-lesson-id]", lessonsWrap).length + 1;
            lessonsWrap.appendChild(createLessonRow(moduleId, nextIndex));
            refreshIcons();
        }
    });

    return box;
};

const addModule = () => {
    moduleSeq += 1;
    const box = createModuleBox(String(moduleSeq), moduleSeq);
    el.modulesWrap.appendChild(box);
    refreshIcons();
};

const renumberModules = () => {
    qsa("[data-module-id]", el.modulesWrap).forEach((box, idx) => {
        const label = qs("label.block.text-sm", box);
        if (label) label.textContent = `Módulo ${idx + 1}`;
    });
};

// Inicial: 1 módulo com 1 aula
if (el.modulesWrap && el.addModuleBtn) {
    addModule();
    el.addModuleBtn.addEventListener("click", addModule);
}

// -----------------------------
// Coleta → Payload
// -----------------------------
const collectModules = () => {
    const modules = [];
    const boxes = qsa("[data-module-id]", el.modulesWrap);

    boxes.forEach((box, mIdx) => {
        const title = (qs("[data-module-title]", box)?.value || "").trim();
        if (!title) return; // ignora módulo sem título

        const lessons = qsa("[data-lesson-id]", box)
            .map((row, lIdx) => {
                const lTitle = (qs("[data-lesson-title]", row)?.value || "").trim() || `Aula ${lIdx + 1}`;
                const lType = qs("[data-lesson-type]", row)?.value || "text";
                const mins = parseInt(qs("[data-lesson-duration]", row)?.value || "0", 10);
                const duration_sec = Math.max(0, mins) * 60;

                let content_html = null;
                let video_url = null;
                if (lType === "video") video_url = "";
                if (lType === "text" || lType === "activity") content_html = "";

                return {
                    title: lTitle,
                    content_html,
                    video_url,
                    duration_sec,
                    position: lIdx + 1,
                    is_preview: 0,
                };
            })
            .filter(Boolean);

        if (!lessons.length) return; // precisa ter ao menos 1 aula

        modules.push({
            title,
            position: mIdx + 1,
            lessons,
        });
    });

    return modules;
};

const buildPayload = (publish = true) => {
    const title = (el.title?.value || "").trim();
    if (!title) throw new Error("Informe o título do curso.");

    const description = (el.description?.value || "").trim();
    const payload = {
        title,
        summary: firstSentence(description, 240) || null,
        description: description || null,
        thumbnail_url: (el.thumbnailUrl?.value || "").trim() || null,
        category_id: el.category?.value ? parseInt(el.category.value, 10) : null,
        level: el.level?.value || "beginner",
        language: "pt-BR",
        is_published: publish ? 1 : 0,
        price_cents: toCents(el.price?.value || 0),
        modules: collectModules(),
    };

    if (!payload.modules.length) {
        throw new Error("Adicione pelo menos 1 módulo com 1 aula.");
    }
    return payload;
};


async function login(event) {
    event.preventDefault()
    const form = event.target;
    const formData = new FormData(form);

    try {
        const response = await fetch(`./app/routes/auth/auth_login.php`, {
            method: 'POST',
            body: formData
        })
        const result = await response.json();
        if (result?.success) {
            // alert('Login feito com sucesso!');
            // toastr('Login realizado com Sucesso', 'success')
            window.location.href = './myDashboard';
        } else {
            alert(result?.message || 'Falha no login.');
        }
    } catch (err) {
        console.error(err);
        alert('Erro ao tentar logar.');
    }
}

const logout = async () => {
    try {
        const resp = await fetch('./app/routes/auth/auth_logout.php')
        const result = await resp.json()

        console.log(result)
        if (result?.success) {
            window.location.href = './index';
        }
    } catch (error) {

    }
}

async function register(event) {
    event.preventDefault()
    const form = event.target;
    const formData = new FormData(form);

    try {
        const response = await fetch(`./app/routes/auth/auth_register.php`, {
            method: 'POST',
            body: formData
        })
        const result = await response.json();
        if (result?.success) {
            // alert('Login feito com sucesso!');
            // toastr('Login realizado com Sucesso', 'success')
            window.location.href = './login';
        } else {
            alert(result?.message || 'Falha no registro.');
        }
    } catch (err) {
        console.error(err);
        alert('Erro ao tentar logar.');
    }
}

// -----------------------------
// Submit (criar curso)
// -----------------------------
const submitCourse = async (publish) => {
    const btns = [el.publishBtn, el.draftBtn];
    toggleLoading(btns, true);

    try {
        const body = buildPayload(publish);
        const res = await fetch(API.CREATE, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(body),
        });
        const json = await res.json();
        if (!json.success) throw new Error(json.message || "Falha ao criar curso");

        alert("Curso criado com sucesso!");
        // Exemplo: redirecionar para a página do curso
        // location.href = `/codesphere/public/pages/course.php?slug=${json.data.course.slug}`;
    } catch (e) {
        console.error(e);
        alert("Erro: " + e.message);
    } finally {
        toggleLoading(btns, false);
    }
};

if (el.publishBtn) el.publishBtn.addEventListener("click", (e) => { e.preventDefault(); submitCourse(true); });
if (el.draftBtn) el.draftBtn.addEventListener("click", (e) => { e.preventDefault(); submitCourse(false); });

// -----------------------------
// Página de curso (detalhe) – carregar por id/slug
// -----------------------------
const loadCourseFromQuery = async () => {
    // Só tenta se existir algum alvo típico da página de detalhe
    if (!document.querySelector("h1") && !el.accordion) return;

    const url = new URL(location.href);
    const id = url.searchParams.get("id");
    const slug = url.searchParams.get("slug");
    const qsfx = id ? `?id=${encodeURIComponent(id)}` : (slug ? `?slug=${encodeURIComponent(slug)}` : "");
    if (!qsfx) return;

    try {
        const res = await fetch(`${API.GET_ONE}${qsfx}`);
        const json = await res.json();
        if (!json.success) throw new Error(json.message || "Falha ao carregar curso");
        const c = json.data;

        const Tlessons = c.modules.map(m => m.lessons.length).reduce((a, b) => a + b, 0)

        document.getElementById("title").textContent = c.title;
        document.getElementById("description").textContent = c.summary;
        document.getElementById("badge-category").textContent = c.category;
        document.getElementById("duration").textContent = c.total_duration_text;
        document.getElementById("students").textContent = c.students || 1;
        document.getElementById("rating").textContent = c.rating || 4.8;
        document.getElementById("thumbnail").src = c.thumbnail_url || './public/src/assets/course-business.jpg';
        document.getElementById("price").textContent = c.price_brl;
        document.getElementById("qtdClass").textContent = Tlessons + ' aulas';
        document.getElementById("instructor-name").textContent = c.instructors[0].full_name;
        document.getElementById("instructor-bio").textContent = c.instructors[0].bio;

        // Accordion
        if (el.accordion) {
            el.accordion.innerHTML = "";
            c.modules.forEach((m, i) => {
                const key = `m${i + 1}`;
                const block = document.createElement("div");
                block.className = "border-b border-border/50";
                block.innerHTML = `
            <button class="w-full flex items-center justify-between py-4 hover:text-primary" data-acc="${key}">
              <span class="font-semibold text-left">Módulo ${i + 1}: ${m.title}</span>
              <svg class="h-5 w-5 transition-transform" data-acc-icon="${key}" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="m6 9 6 6 6-6"/>
              </svg>
            </button>
            <div class="hidden pb-5 space-y-2" data-acc-panel="${key}"></div>
          `;
                el.accordion.appendChild(block);

                const panel = qs(`[data-acc-panel="${key}"]`, block);
                m.lessons.forEach((l) => {
                    const a = document.createElement("a");
                    a.className = "flex items-center justify-between p-3 rounded-lg hover:bg-primary/10 transition-smooth";
                    a.href = `/courses/${c.id}/lesson/${l.id}`; // ajuste para sua rota real
                    a.innerHTML = `
              <div class="flex items-center gap-3">
                <i data-lucide="${l.video_url ? "play-circle" : "file-text"}" class="h-4 w-4 ${l.video_url ? "text-primary" : "text-secondary"}"></i>
                <span class="text-sm">${l.title}</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="text-xs text-muted-foreground">${Math.max(1, Math.round((l.duration_sec || 0) / 60))}min</span>
                ${l.is_preview ? '<span class="text-[10px] px-2 py-1 rounded bg-white/10">Preview</span>' : ""}
              </div>
            `;
                    panel.appendChild(a);
                });
            });

            // Comportamento do accordion (abrir/fechar – um por vez)
            let openKey = null;
            el.accordion.addEventListener("click", (ev) => {
                const btn = ev.target.closest("[data-acc]");
                if (!btn) return;
                const key = btn.getAttribute("data-acc");
                const panel = qs(`[data-acc-panel="${key}"]`, el.accordion);
                const icon = qs(`[data-acc-icon="${key}"]`, el.accordion);

                if (openKey && openKey !== key) {
                    const prevPanel = qs(`[data-acc-panel="${openKey}"]`, el.accordion);
                    const prevIcon = qs(`[data-acc-icon="${openKey}"]`, el.accordion);
                    prevPanel?.classList.add("hidden");
                    prevIcon?.classList.remove("rotate-180");
                }

                panel?.classList.toggle("hidden");
                icon?.classList.toggle("rotate-180");
                openKey = panel?.classList.contains("hidden") ? null : key;
            });

            refreshIcons();
        }
    } catch (e) {
        console.error(e);
        alert("Erro ao carregar o curso: " + e.message);
    }
};

// -----------------------------
// Listagem / Cards / Skeleton
// -----------------------------
const skeleton = {
    price: () => `<div class="h-5 w-20 rounded bg-white/10 animate-pulse"></div>`,
    text: (n = 2) => Array.from({ length: n })
        .map(() => `<div class="h-4 w-full rounded bg-white/10 animate-pulse"></div>`)
        .join('<div class="h-1"></div>'),
    card: () => `
      <article class="rounded-2xl ring-1 ring-white/10 bg-card overflow-hidden shadow-premium">
        <div class="aspect-video bg-white/10 animate-pulse"></div>
        <div class="p-5 space-y-3">
          ${skeleton.text(1)}
          ${skeleton.text(2)}
          <div class="flex items-center justify-between pt-2">
            ${skeleton.text(1)}
            ${skeleton.price()}
          </div>
        </div>
      </article>`,
};

const renderLoading = (count = 6) => {
    if (!el.grid || !el.emptyState) return;
    el.grid.innerHTML = Array.from({ length: count }).map(skeleton.card).join("");
    el.emptyState.classList.add("hidden");
    refreshIcons();
};

const courseCard = (c) => {

    const imgSrc = c.thumbnail_url || "./public/src/assets/course-design.jpg";
    return `
      <article class="rounded-2xl ring-1 ring-white/10 bg-card overflow-hidden shadow-premium hover:translate-y-[-2px] transition">
        <a href="/codesphere/courseDetail?slug=${c.slug}" class="block aspect-video overflow-hidden">
          <img src="${imgSrc}" alt="${c.title}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
        </a>
        <div class="p-5">
          <div class="mb-2 text-sm text-muted-foreground">${c.category || "Geral"}</div>
          <h3 class="text-lg font-semibold leading-tight line-clamp-2">
            <a href="/codesphere/courses/${c.slug}" class="hover:underline">${c.title}</a>
          </h3>
          <p class="mt-2 text-sm text-muted-foreground line-clamp-2">${c.subtitle || ""}</p>
          <div class="mt-4 flex items-center justify-between">
            <div class="flex items-center gap-3 text-sm text-muted-foreground">
              <span class="inline-flex items-center gap-1"><i data-lucide="award" class="w-4 h-4"></i> Certificado</span>
              <span class="inline-flex items-center gap-1"><i data-lucide="play-circle" class="w-4 h-4"></i> Aulas</span>
            </div>
            <div class="font-bold">${c.price_brl}</div>
          </div>
        </div>
      </article>
    `;
};

const fetchCourses = async () => {
    if (!el.grid || !el.emptyState) return;
    const q = (el.search?.value || "").trim();
    const category = el.filterCat?.value || "";

    const url = new URL(API.LIST, window.location.origin);
    if (q) url.searchParams.set("q", q);
    if (category) url.searchParams.set("category_id", category);
    url.searchParams.set("limit", "24");
    url.searchParams.set("offset", "0");

    renderLoading();

    try {
        const res = await fetch(url.toString());
        const json = await res.json();
        if (!json.success) throw new Error(json.message || "Falha ao listar cursos");
        const items = json.data || [];

        if (!items.length) {
            el.grid.innerHTML = "";
            el.emptyState.classList.remove("hidden");
        } else {
            el.emptyState.classList.add("hidden");
            // console.log(items)
            el.grid.innerHTML = items.filter(c => c.published).map(courseCard).join("");
            refreshIcons();
        }
    } catch (e) {
        console.error(e);
        el.grid.innerHTML = "";
        el.emptyState.classList.remove("hidden");
    }
};

// Eventos de busca/filtro com debounce
if (el.search) el.search.addEventListener("input", debounce(fetchCourses, 300));
if (el.filterCat) el.filterCat.addEventListener("change", fetchCourses);

// -----------------------------
// Boot
// -----------------------------
// Se existir grid, já carrega a lista
if (el.grid) fetchCourses();

// Se existir alvo de detalhe, tenta carregar por id/slug
loadCourseFromQuery();

// toastr.options = {
//     "closeButton": true,              // botão de fechar
//     "debug": false,
//     "newestOnTop": true,
//     "progressBar": true,             // barra de progresso
//     "positionClass": "toast-top-right",  // posição na tela
//     "preventDuplicates": true,
//     "onclick": null,
//     "showDuration": "300",           // tempo da animação de entrada (ms)
//     "hideDuration": "300",          // tempo da animação de saída (ms)
//     "timeOut": "1000",               // tempo até desaparecer (ms) — 5 segundos
//     "extendedTimeOut": "1000",       // tempo extra se o mouse estiver em cima
//     "showEasing": "swing",
//     "hideEasing": "linear",
//     "showMethod": "fadeIn",
//     "hideMethod": "fadeOut"
// };
