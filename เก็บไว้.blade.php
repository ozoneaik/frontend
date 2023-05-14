<script>
    function reloadData() {
        // เรียกใช้งาน AJAX หรือ Fetch API เพื่อดึงข้อมูลจากเซิร์ฟเวอร์
        // และอัปเดตตารางหลังจากได้รับข้อมูลใหม่
        fetch('/reload')  // เปลี่ยนเป็นเส้นทาง URL ที่คุณต้องการดึงข้อมูลจาก
            .then(response => response.text())
            .then(data => {
                document.getElementById('data-table').innerHTML = data;
            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการโหลดข้อมูล:', error);
            });
    }
    console.log('reload data finished');
    setInterval(reloadData, 10000);  // 60000 = 1 นาที (หน่วยเป็นมิลลิวินาที)

    reloadData();
</script>