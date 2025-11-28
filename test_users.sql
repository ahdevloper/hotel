-- ملف بيانات اختبار لجدول المستخدمين
-- يمكنك استيراد هذا الملف إلى قاعدة البيانات باستخدام phpMyAdmin

-- أولاً، قم بإضافة مستخدمين تجريبيين
INSERT INTO user (username, email, password) VALUES 
('admin', 'admin@example.com', '25d55ad283aa400af464c76d713c07ad'), -- كلمة المرور: admin
('manager', 'manager@example.com', '21232f297a57a5a743894a0e4a801fc3'), -- كلمة المرور: admin
('user1', 'user1@example.com', '5f4dcc3b5aa765d61d8327deb882cf99'); -- كلمة المرور: password

-- يمكنك استخدام هذه البيانات لتجربة تسجيل الدخول:
-- 1. اسم المستخدم: admin، كلمة المرور: admin
-- 2. البريد الإلكتروني: admin@example.com، كلمة المرور: admin
-- 3. اسم المستخدم: user1، كلمة المرور: password
