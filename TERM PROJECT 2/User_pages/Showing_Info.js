        // تعريف دالة showProfile لعرض النافذة المنبثقة
        function showProfile() {
            const popup = document.getElementById('profilePopup');
            popup.style.display = 'block'; // عرض النافذة المنبثقة
            document.body.classList.add('profile-active'); // إضافة فئة CSS لجسم الصفحة
        }

        // تعريف دالة closeProfile لإغلاق النافذة المنبثقة
        function closeProfile() {
            const popup = document.getElementById('profilePopup');
            popup.style.display = 'none'; // إخفاء النافذة المنبثقة
            document.body.classList.remove('profile-active'); // إزالة فئة CSS من جسم الصفحة
        }