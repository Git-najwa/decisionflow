const defaultHeaders = {
  'Content-Type': 'application/json',
  'X-Requested-With': 'XMLHttpRequest',
  'Accept': 'application/json',
};

let defaultBaseUrl = ''; // Défini dynamiquement via setDefaultBaseUrl()

/**
 * Met à jour les headers par défaut.
 */
export function setDefaultHeaders(headers) {
  Object.assign(defaultHeaders, headers);
}

/**
 * Définit l'URL de base par défaut.
 */
export function setDefaultBaseUrl(url) {
  if (url.endsWith('/')) url = url.slice(0, -1);
  defaultBaseUrl = url;
}

/**
 * Effectue une requête HTTP JSON avec gestion des erreurs et timeout.
 */
export function fetchJson(options) {
  if (typeof options === 'string') {
    options = { url: options };
  }

  const {
    url,
    data = null,
    method = null,
    headers = {},
    timeout = 5000,
    baseUrl = null,
  } = options;

  if (typeof url !== 'string') throw new Error('The URL must be a string.');
  const theMethod = method ? method.toUpperCase() : (data ? 'POST' : 'GET');

  // Construction de l'URL complète
  let fullUrl;
  if (url.startsWith('http://') || url.startsWith('https://')) {
    fullUrl = url;
  } else {
    const base = baseUrl ?? defaultBaseUrl;
    fullUrl = base + (url.startsWith('/') ? url : '/' + url);
  }

  if (theMethod === 'GET' && data) {
    const queryString = new URLSearchParams(data).toString();
    fullUrl += '?' + queryString;
  }

  const allHeaders = { ...defaultHeaders, ...headers };
  const controller = new AbortController();
  const timeoutId = setTimeout(() => controller.abort(), timeout);
  const signal = controller.signal;
  const body = theMethod !== 'GET' && data ? JSON.stringify(data) : null;

  const request = new Promise((resolve, reject) => {
    fetch(fullUrl, { method: theMethod, headers: allHeaders, body, signal })
      .then(resp => {
        clearTimeout(timeoutId);
        const clone = resp.clone();
        return resp.json()
          .then(json => {
            if (!resp.ok) {
              reject({ status: resp.status, statusText: resp.statusText, data: json });
            } else {
              resolve(json);
            }
          })
          .catch(() => {
            return clone.text()
              .then(() => reject({
                status: resp.status,
                statusText: 'Erreur JSON dans la réponse',
                data: null,
              }))
              .catch(() => reject({
                status: resp.status,
                statusText: 'Réponse illisible',
                data: null,
              }));
          });
      })
      .catch(err => {
        clearTimeout(timeoutId);
        if (err.name === 'AbortError') {
          reject({ status: 0, statusText: 'Timeout ou annulation', data: null });
        } else {
          reject({ status: 0, statusText: err.message || 'Erreur réseau', data: null });
        }
      });
  });

  return {
    request,
    abort: () => controller.abort(),
  };
}
