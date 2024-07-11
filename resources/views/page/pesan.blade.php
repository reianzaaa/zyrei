
<div class="formbold-main-wrapper">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', sans-serif;
    }
    .formbold-mb-3 {
      margin-bottom: 15px;
    }
    .formbold-relative {
      position: relative;
    }
    .formbold-opacity-0 {
      opacity: 0;
    }
    .formbold-stroke-current {
      stroke: currentColor;
    }
    #supportCheckbox:checked ~ div span {
      opacity: 1;
    }
  
    .formbold-main-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px;
    }
  
    .formbold-form-wrapper {
      margin: 0 auto;
      max-width: 570px;
      width: 100%;
      background: white;
      padding: 40px;
    }
  
    .formbold-img {
      margin-bottom: 45px;
    }
  
    .formbold-form-title {
      margin-bottom: 30px;
    }
    .formbold-form-title h2 {
      font-weight: 600;
      font-size: 28px;
      line-height: 34px;
      color: #07074d;
    }
    .formbold-form-title p {
      font-size: 16px;
      line-height: 24px;
      color: #536387;
      margin-top: 12px;
    }
  
    .formbold-input-flex {
      display: flex;
      gap: 20px;
      margin-bottom: 15px;
    }
    .formbold-input-flex > div {
      width: 50%;
    }
    .formbold-form-input {
      /* text-align: center; */
      width: 100%;
      padding: 13px 22px;
      border-radius: 5px;
      border: 1px solid #dde3ec;
      background: #ffffff;
      font-weight: 500;
      font-size: 16px;
      color: #536387;
      outline: none;
      resize: none;
    }
    .formbold-form-input:focus {
      border-color: #6a64f1;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
    .formbold-form-label {
      color: #536387;
      font-size: 14px;
      line-height: 24px;
      display: block;
      margin-bottom: 10px;
    }
  
    .formbold-checkbox-label {
      display: flex;
      cursor: pointer;
      user-select: none;
      font-size: 16px;
      line-height: 24px;
      color: #536387;
    }
    .formbold-checkbox-label a {
      margin-left: 5px;
      color: #6a64f1;
    }
    .formbold-input-checkbox {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border-width: 0;
    }
    .formbold-checkbox-inner {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 20px;
      height: 20px;
      margin-right: 16px;
      margin-top: 2px;
      border: 0.7px solid #dde3ec;
      border-radius: 3px;
    }
  
    .formbold-btn {
      font-size: 16px;
      border-radius: 5px;
      padding: 14px 25px;
      border: none;
      font-weight: 500;
      background-color: #6a64f1;
      color: white;
      cursor: pointer;
      margin-top: 25px;
    }
    .formbold-btn:hover {
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
  </style>
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
      
      <img src="">
  
      <form action="/pesanan" method="POST">
        <div class="formbold-form-title">
          <h2 class="">Formulir Pemesanan</h2>
          <p>
            Hallo selamat datang silahkan order jasa kami dan lengkapi formulir ini agar segera kami proses.
          </p>
        </div>
  
        <div class="formbold-input-flex">
          <div>
            <label for="firstname" class="formbold-form-label">
              Nama
            </label>
            <input
              type="text"
              name="name"
              id="name"
              class="formbold-form-input"
            />
          </div>
          <div>
            <label for="phone" class="formbold-form-label"> Nomor HP </label>
            <input
              type="text"
              name="phone"
              id="phone"
              class="formbold-form-input"
            />
          </div>
        </div>
        @csrf
  
        <div class="formbold-mb-3">
          <label for="address" class="formbold-form-label">
            Paket
          </label>
          <select
            name="paket"
            id="paket"
            class="formbold-form-input"
          >
          @foreach ($paket as $item)
          <option class="formbold-form-input" value="{{$item->id}}">{{$item->nama."/".$item->hari."H/".$item->grup."G/Rp.".$item->harga }}</option>
          @endforeach
         
          </select>
        </div>

        <button type="button" id="start" class="formbold-btn">Mulai Rekam</button>
        <button type="button" id="stop" class="formbold-btn">Stop Rekam</button>

        <button type="submit" class="formbold-btn">Pesan Sekarang</button>
      </form>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
   window.onload = function () {
    const startButton = document.getElementById("start");
    const stopButton = document.getElementById("stop");

    let mediaRecorder;
    let audioChunks = [];
   
        startButton.onclick = function () {
            navigator.mediaDevices
                .getUserMedia({ audio: true })
                .then(function (stream) {
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.start();
                    mediaRecorder.addEventListener(
                        "dataavailable",
                        function (event) {
                            if (event.data.size > 0) {
                                audioChunks.push(event.data);
                            }
                        }
                    );

                    mediaRecorder.addEventListener("stop", function () {
                        const audioBlob = new Blob(audioChunks, {
                            type: "audio/wav",
                        });
                     getText(audioBlob);

                    });
                    startButton.disabled = true;
                    stopButton.disabled = false;
                })
                .catch(function (error) {
                    console.error("Error accessing microphone:", error);
                });
        };

        stopButton.onclick = function () {
            if (mediaRecorder.state !== "inactive") {
                mediaRecorder.stop();
                audioChunks = [];
            }

            stopButton.disabled = true;
            startButton.disabled = false;
        };
    };

async function getText(audio){
    text = await speechToText(audio)
    const regex = /(.+?)\s*nomor\s*(.+)/;
    const match = text.match(regex);
    console.log(text);

if (match) {
    const name = match[1].trim();
    const phone = match[2].trim();
    $('#name').val(name);

    $('#phone').val(phone);
} else {
    alert("Text format is incorrect.");
}
    }
function speechToText(surat) {
    return new Promise((resolve, reject) => {
        let formData = new FormData();
        formData.append("model", "whisper-1");
        formData.append("file", surat, "audio.wav");
        formData.append("language", "id");
        $.ajax({
            url: "https://api.openai.com/v1/audio/transcriptions",
            type: "POST",
            headers: {
                Authorization:
                    "Bearer sk-proj-UMC4eBK8DE88eiCazIQZT3BlbkFJqJdcYK13ZKCbJAsDYzdJ",
            },
            data: formData,
            contentType: false,
            processData: false,
            success: (data) => {
                text = data.text;
                resolve(text); // Resolves the promise with the text
            },
            error: (err) => {
                resolve(text);
                reject(err); // Rejects the promise if there's an error
            },
        });
    });
    
}


  </script>