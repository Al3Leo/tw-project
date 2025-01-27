/* Qusto script genera automaticamente una serie di date comprese tra il 2025 e il 2027 e le inserisce 
   nelle colonne 'datapartenza' e 'dataarrivo' della tabella 'viaggio'
*/
DO $$
DECLARE
    r RECORD;
    start_date DATE;
    end_date DATE;
    random_days INTEGER;  -- Durata casuale del viaggio
    year_choice INTEGER;  -- Anno casuale
BEGIN
    FOR r IN
        SELECT idevento FROM viaggio
        WHERE datapartenza IS NULL OR dataritorno IS NULL
    LOOP
        -- Scegli un anno casuale tra 2025, 2026 e 2027
        year_choice := 2025 + trunc(random() * 3)::INTEGER;

        -- Genera una data di partenza casuale per l'anno scelto
        start_date := DATE (year_choice || '-01-01') + floor(random() * 365)::INTEGER;

        -- Controlla che la data casuale non ecceda il 31 dicembre dell'anno
        IF start_date > DATE (year_choice || '-12-31') THEN
            start_date := DATE (year_choice || '-12-31');
        END IF;

        -- Genera una durata casuale tra 5 e 15 giorni
        random_days := 5 + trunc(random() * 11)::INTEGER;
        end_date := start_date + random_days;

        -- Aggiorna le colonne datapartenza e dataritorno
        EXECUTE 'UPDATE viaggio
                 SET datapartenza = $1, dataritorno = $2
                 WHERE idevento = $3'
        USING start_date, end_date, r.idevento;
    END LOOP;
END $$;
