const serverIP = "mcj.duotics.com";
const serverPort = 6066;

async function fetchServerData() {
    try {
        const response = await fetch(`https://mcapi.us/server/status?ip=${serverIP}&port=${serverPort}`);
        const data = await response.json();

        document.getElementById("server-status").textContent = data.online ? "Sí" : "No";
        document.getElementById("server-version").textContent = data.server.name || "N/A";
        document.getElementById("player-count").textContent = `${data.players.now} / ${data.players.max}`;
    } catch (error) {
        console.error("Error al consultar la API:", error);
    }
}

fetchServerData();
setInterval(fetchServerData, 10000); // Actualiza cada 30 segundos