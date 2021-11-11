function messageManagement(success, error) {
    if (success) {
        alertify.success("İşlem Başarılı");
    } else {
        alertify.error(error);
    }
}