// todo : DOM selection section
const formInput = document.getElementById("formInput");
const nama = document.getElementById("nama");
const nim = document.getElementById("nim");
const motto = document.getElementById("motto");
const prodi = document.querySelector(".prodi");
const prodiBtn = document.querySelector(".select-prodi");
const divisiBtn = document.querySelector(".select-divisi");
const prodiList = document.querySelector(".list-prodi");
const prodiDipilih = document.querySelector(".prodi-dipilih");
const hideInputProdi = document.getElementById("prodi-selected");
const hideIdProdi = document.getElementById("prodiID");
const prodiLi = prodiList.querySelectorAll("li");
const divisiList = document.querySelector(".list-divisi");
const divisiDipilih = document.querySelector(".divisi-dipilih");
const hideInputDivisi = document.getElementById("divisi-selected");
const hideIdDivisi = document.getElementById("divisiID");
const divisiLi = divisiList.querySelectorAll("li");
const iconDown = document.querySelectorAll(".down");

// ambil dataet-id
// kirim ke divisiID/prodiID sbg value

// todo : remove word or number from input, capitalize, & remove spaces in first string

nim.addEventListener("input", (e) => {
  let nilai = e.target.value;

  if (/\D/.test(nilai) === true) {
    e.target.value = nilai.replace(/\D/, "");
    parseInt(e.target.value);
  }
});

nama.addEventListener("input", (e) => {
  let nilai = e.target.value;

  if (/^\W/.test(nilai) === true) {
    e.target.value = nilai.replace(/^\W/, "");
  }

  if (/\d/.test(nilai) === true) {
    e.target.value = nilai.replace(/\d/, "");
  }

  const splitInput = e.target.value.split(""); // ["a", "b", "c", "d"]

  if (splitInput.length > 0) {
    // jika inputan user terisi, mk lakukan...
    const firstWord = splitInput[0].toUpperCase(); // "A"
    splitInput[0] = firstWord; // ["A", "b", "c", "d"]
    e.target.value = splitInput.join(""); // abcd = "Abcd" (yg ditampilkan)
  }
});

// todo : dropdown + animated icon

prodiBtn.addEventListener("click", (e) => {
  e.preventDefault();

  prodiList.classList.toggle("dd-show");

  iconDown.forEach((icon) => {
    if (icon.parentElement.className == "select-prodi") {
      prodiBtn.children[1].classList.toggle("icon-animated");
    }
  });
});

divisiBtn.addEventListener("click", (e) => {
  e.preventDefault();

  divisiList.classList.toggle("dd-show");

  iconDown.forEach((icon) => {
    if (icon.parentElement.className == "select-divisi") {
      divisiBtn.children[1].classList.toggle("icon-animated");
    }
  });
});

document.addEventListener("click", (e) => {
  if (!prodiBtn.contains(e.target)) {
    prodiList.classList.remove("dd-show");
    prodiBtn.children[1].classList.remove("icon-animated");
  }

  if (!divisiBtn.contains(e.target)) {
    divisiList.classList.remove("dd-show");
    divisiBtn.children[1].classList.remove("icon-animated");
  }
});

prodiLi.forEach((li) => {
  li.addEventListener("click", (e) => {
    let userPilih = e.target.innerText;
    const prodiIdSelected = parseInt(li.dataset.id);

    prodiDipilih.innerHTML = userPilih;
    prodiDipilih.setAttribute("value", userPilih);
    prodiDipilih.classList.add("pilihan-mhs");
    hideInputProdi.value = userPilih;
    hideIdProdi.value = prodiIdSelected;
  })
});

divisiLi.forEach((li) => {
  li.addEventListener("click", (e) => {
    let userPilih = e.target.innerText;
    const prodiIdSelected = parseInt(li.dataset.id);

    divisiDipilih.innerHTML = userPilih;
    divisiDipilih.setAttribute("value", userPilih);
    divisiDipilih.classList.add("pilihan-mhs");
    hideInputDivisi.value = userPilih;
    hideIdDivisi.value = prodiIdSelected;
  });
});

// todo : input validation

formInput.addEventListener("submit", (e) => {

  if (nama.value === "" || /\d/.test(nama.value) === true) {
    alert(`Silahkan isi nama & Pastikan tidak ada angka`);
    e.preventDefault();
    nama.focus();
    return;
  }

  if (nim.value === "" || /\D/.test(nim.value) === true) {
    alert(`Silahkan isi NIM & Pastikan tidak ada huruf`);
    e.preventDefault();
    nim.focus();
    return;
  }

  if (prodiDipilih.textContent == "Pilih Program Studi") {
    alert(`Silahkan pilih program studi`);
    e.preventDefault();
    return;
  }

  if (divisiDipilih.textContent == "Pilih Divisi") {
    alert(`Silahkan pilih divisi`);
    e.preventDefault();
    return;
  }
});
