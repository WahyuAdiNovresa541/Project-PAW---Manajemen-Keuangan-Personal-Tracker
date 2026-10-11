const apiKey = "1|gT8y...token_yang_didapat_dari_login_backend...xyz"; // Ini token dinamis dari backend

fetch('http://127.0.0.1:8000/api/posts', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'Authorization': `Bearer ${apiKey}` // Mengirim API Key ke Backend
    },
    body: JSON.stringify({
        title: "Judul Baru",
        content: "Isi konten baru",
        category_id: 1
    })
})
.then(response => response.json())
.then(data => console.log(data));