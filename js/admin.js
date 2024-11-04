function togglePanel() {
    var panel = document.getElementById('userPanel');
    if (panel.style.display === 'none' || panel.style.display === '') {
        panel.style.display = 'block'; // Mostra il pannello
    } else {
        panel.style.display = 'none'; // Nascondi il pannello
    }
}

