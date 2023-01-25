import Swal from 'sweetalert2';

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        } else {
            event.preventDefault()
            event.stopPropagation()
            Swal.fire({
                title: 'Simpan Data ?',
                text: 'Lanjutkan untuk menyimpan',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then( (willSaved) => {
                if( willSaved.isConfirmed ) {
                    Swal.fire(
                        'Berhasil 👍',
                        'Data berhasil disimpan',
                        'success'
                    ),
                    setInterval(() => {
                        form.submit();
                    }, 1500)
                }
            });
        }


        form.classList.add('was-validated')
      }, false)
    })
})()

const sidebar = document.querySelector('#sidebar');
const content = document.querySelector('#content');
const overlayLayer = document.querySelector('#overlay');
const   btnTopbar = document.querySelector('#btn-topbar');
        btnTopbar.addEventListener("click", ()=> {
            sidebar.classList.toggle('hide');
            content.classList.toggle('active');
            overlayLayer.classList.toggle('active');
        });

window.addEventListener("resize", (e) => {
    if(e.target.screen.availWidth < 768) {
        sidebar.classList.remove('hide');
        content.classList.remove('active');
        overlayLayer.classList.remove('active');
    }
});

window.addEventListener("click", (e)=> {
    if(e.target == overlayLayer) {
        sidebar.classList.toggle('hide');
        content.classList.toggle('active');
        overlayLayer.classList.toggle('active');
    }
});


const   btnDelete = document.querySelectorAll('.btn-delete');
        btnDelete.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const form = btn.parentElement;
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus data ini ?',
                    text: 'Klik batal jika tidak ingin menghapus data ini',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then( (willSaved) => {
                    if( willSaved.isConfirmed ) {
                        Swal.fire(
                            'Berhasil Menghapus👍',
                            'Data berhasil dihapus',
                            'success'
                        ),
                        setInterval(() => {
                            form.submit();
                        }, 1500)
                    }
                });
            })
});






