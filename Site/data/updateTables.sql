ALTER TABLE utilisateur ALTER COLUMN password TYPE VARCHAR(255); -- Pour le hachage

ALTER TABLE candidat DROP CONSTRAINT candidat_etape_check;