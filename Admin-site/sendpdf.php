<?php
/**
 * admin_orders.php
 * 
 * Admin panel — sab orders dikhata hai.
 * Complete orders par "Send PDF" button hota hai.
 * Status change karne ka option bhi hai.
 */

include('...includes/connection.php');

// ─── Status update (admin se) ────────────────────────────────────────────────
if (isset($_POST['update_status'])) {
    $upd_id     = intval($_POST['upd_id']);
    $upd_status = mysqli_real_escape_string($conn, $_POST['upd_status']);
    mysqli_query($conn, "UPDATE orders SET status='$upd_status' WHERE id=$upd_id");
    header("Location: admin_orders.php?updated=1");
    exit();
}

// ─── Filters ─────────────────────────────────────────────────────────────────
$where   = "WHERE 1=1";
$f_status   = isset($_GET['status'])   ? mysqli_real_escape_string($conn, $_GET['status'])   : '';
$f_category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';
$f_book     = isset($_GET['book'])     ? mysqli_real_escape_string($conn, $_GET['book'])     : '';
$f_author   = isset($_GET['author'])   ? mysqli_real_escape_string($conn, $_GET['author'])   : '';

if ($f_status)   $where .= " AND status='$f_status'";
if ($f_category) $where .= " AND category LIKE '%$f_category%'";
if ($f_book)     $where .= " AND book_name LIKE '%$f_book%'";
if ($f_author)   $where .= " AND author LIKE '%$f_author%'";

$orders = mysqli_query($conn, "SELECT * FROM orders $where ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin — Orders</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Poppins;background:#f4f6fa;color:#111}
.topbar{background:#000;color:#fff;padding:14px 30px;font-size:18px;font-weight:600}
.wrap{width:95%;margin:24px auto}
.filter-row{display:flex;gap:10px;margin-bottom:20px;flex-wrap:wrap;align-items:center}
.filter-row input,.filter-row select{
    padding:9px 14px;border-radius:9px;border:1px solid #ddd;
    font-family:Poppins;font-size:13px;outline:none;
}
.filter-row input:focus,.filter-row select:focus{border-color:#000}
.filter-row button{
    padding:9px 18px;background:#000;color:#fff;border:none;
    border-radius:9px;cursor:pointer;font-family:Poppins;font-size:13px;
}
.filter-row button:hover{background:#333}
.clear-btn{background:#888!important}

/* Stats */
.stats{display:flex;gap:14px;margin-bottom:20px;flex-wrap:wrap}
.stat-card{background:#fff;border-radius:12px;padding:16px 24px;min-width:130px;
           box-shadow:0 2px 8px rgba(0,0,0,.07);text-align:center}
.stat-card .num{font-size:26px;font-weight:700}
.stat-card .lbl{font-size:12px;color:#777;margin-top:4px}
.c-green{color:#28a745}.c-amber{color:#f0a500}.c-red{color:#dc3545}.c-blue{color:#007bff}

/* Table */
table{width:100%;border-collapse:collapse;background:#fff;border-radius:12px;
      overflow:hidden;box-shadow:0 2px 10px rgba(0,0,0,.08)}
thead tr{background:#000;color:#fff}
th,td{padding:12px 14px;text-align:left;font-size:13px;border-bottom:1px solid #f0f0f0}
tr:last-child td{border-bottom:none}
tr:hover td{background:#fafafa}

/* Badges */
.badge{display:inline-block;padding:3px 12px;border-radius:20px;font-size:12px;font-weight:600}
.badge-complete{background:#d4edda;color:#155724}
.badge-pending{background:#fff3cd;color:#856404}
.badge-failed{background:#f8d7da;color:#721c24}

/* Buttons */
.btn-send{
    padding:6px 14px;background:#28a745;color:#fff;border:none;
    border-radius:8px;cursor:pointer;font-size:12px;font-family:Poppins;
}
.btn-send:hover{background:#1e7e34}
.btn-send:disabled{background:#aaa;cursor:not-allowed}
.btn-sent{background:#6c757d!important;cursor:default!important}

.btn-status{
    padding:5px 10px;background:#000;color:#fff;border:none;
    border-radius:7px;cursor:pointer;font-size:11px;font-family:Poppins;
}

/* Alert */
.alert{padding:12px 20px;border-radius:9px;margin-bottom:16px;font-size:14px}
.alert-success{background:#d4edda;color:#155724;border:1px solid #c3e6cb}

/* Modal */
.modal-bg{
    display:none;position:fixed;top:0;left:0;width:100%;height:100%;
    background:rgba(0,0,0,0.45);z-index:999;align-items:center;justify-content:center;
}
.modal-bg.open{display:flex}
.modal{background:#fff;border-radius:14px;padding:30px;width:360px;text-align:center}
.modal h3{margin-bottom:12px}
.modal select{width:100%;padding:10px;border-radius:8px;border:1px solid #ddd;
              font-family:Poppins;margin-bottom:14px;font-size:14px}
.modal-btns{display:flex;gap:10px;justify-content:center}
.modal-btns button{padding:9px 22px;border:none;border-radius:8px;
                   cursor:pointer;font-family:Poppins;font-size:13px}
.modal-btns .save{background:#000;color:#fff}
.modal-btns .cancel{background:#eee;color:#111}
</style>
</head>
<body>

<div class="topbar">📚 ReadNova — Admin Orders</div>

<div class="wrap">

    <?php if(isset($_GET['updated'])): ?>
    <div class="alert alert-success">✔ Status update ho gaya!</div>
    <?php endif; ?>

    <!-- Stats Row -->
    <?php
    $total    = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM orders"))['c'];
    $complete = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM orders WHERE status='complete'"))['c'];
    $pending  = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM orders WHERE status='pending'"))['c'];
    $emailed  = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) c FROM orders WHERE email_sent=1"))['c'];
    ?>
    <div class="stats">
        <div class="stat-card"><div class="num c-blue"><?=$total?></div><div class="lbl">Total Orders</div></div>
        <div class="stat-card"><div class="num c-green"><?=$complete?></div><div class="lbl">Complete</div></div>
        <div class="stat-card"><div class="num c-amber"><?=$pending?></div><div class="lbl">Pending</div></div>
        <div class="stat-card"><div class="num c-blue"><?=$emailed?></div><div class="lbl">PDF Emailed</div></div>
    </div>

    <!-- Filters -->
    <form method="GET" class="filter-row">
        <input type="text" name="book"     placeholder="📖 Book name"   value="<?=htmlspecialchars($f_book)?>">
        <input type="text" name="author"   placeholder="✍ Author"       value="<?=htmlspecialchars($f_author)?>">
        <input type="text" name="category" placeholder="📂 Category"    value="<?=htmlspecialchars($f_category)?>">
        <select name="status">
            <option value="">All Status</option>
            <option value="pending"  <?=$f_status=='pending'?'selected':''?>>Pending</option>
            <option value="complete" <?=$f_status=='complete'?'selected':''?>>Complete</option>
            <option value="failed"   <?=$f_status=='failed'?'selected':''?>>Failed</option>
        </select>
        <button type="submit">🔍 Filter</button>
        <a href="admin_orders.php"><button type="button" class="clear-btn">✕ Clear</button></a>
    </form>

    <!-- Orders Table -->
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>Book</th>
                <th>Author</th>
                <th>Category</th>
                <th>Type</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Status</th>
                <th>PDF Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if(mysqli_num_rows($orders) === 0): ?>
            <tr><td colspan="12" style="text-align:center;color:#888;padding:30px;">
                Koi order nahi mila.
            </td></tr>
        <?php else: ?>
        <?php while($row = mysqli_fetch_assoc($orders)): ?>
            <tr>
                <td><?=$row['id']?></td>
                <td>
                    <b><?=htmlspecialchars($row['name'])?></b><br>
                    <span style="font-size:11px;color:#777;"><?=htmlspecialchars($row['email'])?></span>
                </td>
                <td><?=htmlspecialchars($row['book_name'])?></td>
                <td><?=htmlspecialchars($row['author'])?></td>
                <td><?=htmlspecialchars($row['category'] ?? '—')?></td>
                <td><?=htmlspecialchars($row['type'])?></td>
                <td><?=htmlspecialchars($row['quantity'])?></td>
                <td>Rs. <?=htmlspecialchars($row['total_price'])?></td>
                <td><?=htmlspecialchars($row['payment_method'])?></td>
                <td>
                    <?php
                    $s = strtolower($row['status']);
                    $badge_class = $s === 'complete' ? 'badge-complete' : ($s === 'failed' ? 'badge-failed' : 'badge-pending');
                    ?>
                    <span class="badge <?=$badge_class?>"><?=ucfirst($row['status'])?></span>
                </td>
                <td style="text-align:center;">
                    <?php if($row['email_sent'] ?? 0): ?>
                        <span class="badge badge-complete">✔ Sent</span>
                    <?php elseif($s === 'complete' && strtolower($row['type']) === 'pdf'): ?>
                        <button class="btn-send" onclick="sendPDF(<?=$row['id']?>, this)">
                            📧 Send PDF
                        </button>
                    <?php elseif($s !== 'complete'): ?>
                        <span style="font-size:11px;color:#aaa;">Payment pending</span>
                    <?php else: ?>
                        <span style="font-size:11px;color:#aaa;">Not PDF type</span>
                    <?php endif; ?>
                </td>
                <td>
                    <button class="btn-status"
                        onclick="openModal(<?=$row['id']?>, '<?=$row['status']?>')">
                        ✏ Status
                    </button>
                </td>
            </tr>
        <?php endwhile; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Status Change Modal -->
<div class="modal-bg" id="modalBg">
    <div class="modal">
        <h3>Status Change Karein</h3>
        <form method="POST" id="statusForm">
            <input type="hidden" name="update_status" value="1">
            <input type="hidden" name="upd_id" id="modal_id">
            <select name="upd_status" id="modal_status">
                <option value="pending">Pending</option>
                <option value="complete">Complete</option>
                <option value="failed">Failed</option>
            </select>
            <div class="modal-btns">
                <button type="submit" class="save">Save</button>
                <button type="button" class="cancel" onclick="closeModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
// ─── Status Modal ─────────────────────────────────────────────────────────────
function openModal(id, status) {
    document.getElementById('modal_id').value = id;
    document.getElementById('modal_status').value = status;
    document.getElementById('modalBg').classList.add('open');
}
function closeModal() {
    document.getElementById('modalBg').classList.remove('open');
}

// ─── Send PDF via AJAX ────────────────────────────────────────────────────────
function sendPDF(orderId, btn) {
    if (!confirm('Kya aap is order ka PDF email karna chahte hain?')) return;

    btn.disabled = true;
    btn.textContent = '⏳ Bheji ja rahi hai...';

    fetch('send_pdf_email.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'order_id=' + orderId
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            btn.textContent       = '✔ Sent!';
            btn.className         = 'btn-send btn-sent';
            btn.disabled          = true;
            alert('✔ ' + data.msg);
        } else {
            btn.disabled          = false;
            btn.textContent       = '📧 Send PDF';
            alert('❌ ' + data.msg);
        }
    })
    .catch(() => {
        btn.disabled    = false;
        btn.textContent = '📧 Send PDF';
        alert('❌ Network error aa gaya. Dobara try karein.');
    });
}
</script>
</body>
</html>