$(function() {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 5000
    });

    const flashData = $('.flash-data').data('flashdata');
    if(flashData == 'isLogin'){
        Toast.fire({
            icon: 'success',
            title:'Anda Berhasil Login!',
        });
    } else if(flashData == 'Ubah Profil'){
        Toast.fire({
            icon: 'success',
            title:'Profil Anda Berhasil Diubah',
        });
    } else if(flashData == 'Password'){
        Toast.fire({
            icon: 'success',
            title:'Password Anda Berhasil Diubah',
        });
    } else if(flashData == 'Pswbaru=Pswlama'){
        Toast.fire({
            icon: 'error',
            title:'Password baru tidak boleh sama dengan password sekarang!',
        });
    } else if(flashData == 'Pswslh'){
        Toast.fire({
            icon: 'error',
            title:'Password sekarang salah!',
        });
    } else if(flashData == 'hapusps'){
        Toast.fire({
            icon: 'success',
            title:'Data Berhasil Dihapus',
        });
    } else if(flashData == 'Blok'){
        Toast.fire({
            icon: 'info',
            title:'Akun Telah Diblokir!',
        });
    } else if(flashData == 'Unblok'){
        Toast.fire({
            icon: 'info',
            title:'Akun Telah Diaktifkan Kembali!',
        });
    } else if(flashData == 'isLogin'){
        Toast.fire({
            icon: 'success',
            title:'Anda Berhasil Login!',
        });
    } else if(flashData == 'email/pswwrong'){
        Toast.fire({
            icon: 'error',
            title:'Email/Password Anda Salah!',
        });
    } else if(flashData == 'emailnotactivate'){
        Toast.fire({
            icon: 'error',
            title:'Email Belum Diaktivasi',
        });
    } else if(flashData == 'emailnotreg'){
        Toast.fire({
            icon: 'error',
            title:'Email Belum Terdaftar',
        });
    } else if(flashData == 'cekemail'){
        Toast.fire({
            icon: 'info',
            title:'Silahkan Cek Email Anda, Kami Telah Mengirimkan Link Ubah Password!',
        });
    } else if(flashData == 'exptoken'){
        Toast.fire({
            icon: 'warning',
            title:'Token Sudah Kadaluarsa',
        });
    } else if(flashData == 'wrongtoken'){
        Toast.fire({
            icon: 'warning',
            title:'Reset Password Gagal!, Token Salah',
        });
    } else if(flashData == 'emailwrong'){
        Toast.fire({
            icon: 'warning',
            title:'Reset Password Gagal!, Email Salah',
        });
    } else if(flashData == 'logout'){
        Toast.fire({
            icon: 'info',
            title:'Anda Telah Logout!',
        });
    } else if(flashData == 'navSuccess'){
        Toast.fire({
            icon: 'success',
            title:'Menu berhasil di Tambahkan!',
        });
    }else if(flashData == 'navSub'){
        Toast.fire({
            icon: 'success',
            title:'SubMenu berhasil di Tambahkan!',
        });
    }else if(flashData == 'navUpdate'){
        Toast.fire({
            icon: 'info',
            title:'Menu berhasil di Ubah!',
        });
    }else if(flashData == 'navDelete'){
        Toast.fire({
            icon: 'warning',
            title:'Menu berhasil di Hapus!',
        });
    }else if(flashData == 'keyDelete'){
        Toast.fire({
            icon: 'warning',
            title:'API berhasil di Hapus!',
        });
    }else if(flashData == 'keyUpdate'){
        Toast.fire({
            icon: 'info',
            title:'API berhasil di Ubah!',
        });
    }else if(flashData == 'keySuccess'){
        Toast.fire({
            icon: 'success',
            title:'API berhasil di Tambahkan!',
        });
    }else if(flashData == 'socialSuccess'){
        Toast.fire({
            icon: 'success',
            title:'Pintasan berhasil di Tambahkan!',
        });
    }else if(flashData == 'socialUpdate'){
        Toast.fire({
            icon: 'info',
            title:'Pintasan berhasil di Ubah!',
        });
    }else if(flashData == 'socialDelete'){
        Toast.fire({
            icon: 'warning',
            title:'Pintasan berhasil di Hapus!',
        });
    }else if(flashData == 'kbSuccess'){
        Toast.fire({
            icon: 'success',
            title:'Data berhasil di Tambahkan!',
        });
    }else if(flashData == 'kbUpdate'){
        Toast.fire({
            icon: 'info',
            title:'Data berhasil di Ubah!',
        });
    }else if(flashData == 'kbDelete'){
        Toast.fire({
            icon: 'warning',
            title:'Data berhasil di Hapus!',
        });
    }
            // else if(flashData == 'blSuccess'){
            //     Toast.fire({
            //         icon: 'success',
            //         title:'Artikel berhasil dibuat!',
            //     });
            // }
});