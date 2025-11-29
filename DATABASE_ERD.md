# Database ERD - Diskominfo Kab. Pemalang

## ERD Mermaid (Entity Relationship Diagram)

```mermaid
erDiagram
    users ||--o{ berita : creates
    users ||--o| roles : "has role"
    users ||--o{ personal_access_tokens : "has tokens"
    
    roles ||--o{ users : "assigned to"
    roles }o--o{ permissions : "has permissions"
    
    permissions }o--o{ roles : "assigned to"
    
    users {
        bigint id PK
        string name
        string email UK
        timestamp email_verified_at
        string password
        bigint role_id FK
        string remember_token
        timestamp created_at
        timestamp updated_at
    }
    
    roles {
        bigint id PK
        string name UK
        string slug UK
        text description
        timestamp created_at
        timestamp updated_at
    }
    
    permissions {
        bigint id PK
        string name UK
        string slug UK
        text description
        timestamp created_at
        timestamp updated_at
    }
    
    permission_role {
        bigint id PK
        bigint role_id FK
        bigint permission_id FK
        timestamp created_at
        timestamp updated_at
    }
    
    berita {
        bigint id PK
        string judul
        text deskripsi
        string gambar
        date tanggal
        json tags
        enum status "published,draft"
        timestamp created_at
        timestamp updated_at
    }
    
    dokumen_sakip {
        bigint id PK
        string judul
        text deskripsi
        string file_path
        integer tahun
        string jenis
        timestamp created_at
        timestamp updated_at
    }
    
    layanan {
        bigint id PK
        string nama
        text deskripsi
        string icon
        string link
        boolean aktif
        integer urutan
        timestamp created_at
        timestamp updated_at
    }
    
    faq {
        bigint id PK
        string nama
        string email
        text pertanyaan
        text jawaban
        enum status "pending,answered"
        boolean aktif
        integer urutan
        timestamp created_at
        timestamp updated_at
    }
    
    personal_access_tokens {
        bigint id PK
        string tokenable_type
        bigint tokenable_id
        string name
        string token UK
        text abilities
        timestamp last_used_at
        timestamp expires_at
        timestamp created_at
        timestamp updated_at
    }
```

---

## Alternative: Class Diagram Style (Lebih Detail)

```mermaid
classDiagram
    class users {
        +bigint id
        +string name
        +string email
        +timestamp email_verified_at
        +string password
        +bigint role_id
        +string remember_token
        +timestamp created_at
        +timestamp updated_at
    }
    
    class roles {
        +bigint id
        +string name
        +string slug
        +text description
        +timestamp created_at
        +timestamp updated_at
    }
    
    class permissions {
        +bigint id
        +string name
        +string slug
        +text description
        +timestamp created_at
        +timestamp updated_at
    }
    
    class permission_role {
        +bigint id
        +bigint role_id
        +bigint permission_id
        +timestamp created_at
        +timestamp updated_at
    }
    
    class berita {
        +bigint id
        +string judul
        +text deskripsi
        +string gambar
        +date tanggal
        +json tags
        +enum status
        +timestamp created_at
        +timestamp updated_at
    }
    
    class dokumen_sakip {
        +bigint id
        +string judul
        +text deskripsi
        +string file_path
        +integer tahun
        +string jenis
        +timestamp created_at
        +timestamp updated_at
    }
    
    class layanan {
        +bigint id
        +string nama
        +text deskripsi
        +string icon
        +string link
        +boolean aktif
        +integer urutan
        +timestamp created_at
        +timestamp updated_at
    }
    
    class faq {
        +bigint id
        +string nama
        +string email
        +text pertanyaan
        +text jawaban
        +enum status
        +boolean aktif
        +integer urutan
        +timestamp created_at
        +timestamp updated_at
    }
    
    class personal_access_tokens {
        +bigint id
        +string tokenable_type
        +bigint tokenable_id
        +string name
        +string token
        +text abilities
        +timestamp last_used_at
        +timestamp expires_at
        +timestamp created_at
        +timestamp updated_at
    }
    
    users "1" --> "0..*" berita : creates
    users "1" --> "0..1" roles : has
    users "1" --> "0..*" personal_access_tokens : has
    roles "1" --> "0..*" users : assigned_to
    roles "0..*" --> "0..*" permissions : has
    permissions "0..*" --> "0..*" roles : assigned_to
    roles "1" --> "0..*" permission_role : through
    permissions "1" --> "0..*" permission_role : through
```

---

## Cara Menggunakan:

1. **Mermaid Live Editor**: https://mermaid.live
   - Copy code di atas
   - Paste ke editor
   - Download sebagai PNG/SVG

2. **Draw.io untuk Chen Notation**:
   - Buka https://app.diagrams.net
   - Pilih template "Entity Relation"
   - Buat manual dengan style Chen (oval + diamond)

3. **ERDPlus** (Recommended untuk Chen):
   - Buka https://erdplus.com
   - Buat ERD dengan Chen Notation
   - Export sebagai gambar

---

## Tabel Relationships:

| From | To | Type | Description |
|------|-----|------|-------------|
| users | roles | Many-to-One | User has one role |
| users | berita | One-to-Many | User creates many berita |
| users | personal_access_tokens | One-to-Many | User has many tokens |
| roles | permissions | Many-to-Many | Role has many permissions |
