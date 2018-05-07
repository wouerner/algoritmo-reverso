CREATE  FUNCTION fnEncriptaSenha (@p_identificacao varchar(16),  @p_senha varchar(30))  
RETURNS char(15)  AS  
BEGIN 
    DECLARE
        @w	varchar(30),
        @s      varchar(15),
        @t1	int,
    	@t2	int,
        @k      int,
        @i      int,
        @j      int,
        @f      int,
        @v      int
    SET @w = RTRIM(LTRIM(@p_senha))    
    SET @t1 = LEN(RTRIM(LTRIM(@p_identificacao)))
    SET @t2 = LEN(@w)
    IF @t2 < 1 
    BEGIN
        SET @p_senha = '??????'
        SET @w = '??????'
        SET @t2 = 6
    END
    WHILE LEN(@w) < 15
    BEGIN
        SET @w = @w + @w
    END
    SET @w = SUBSTRING(@w, 1, 15)
    SET @k = ASCII(SUBSTRING(@w, 1, 1)) + 2
    SET @s = ''
    SET @i = 0
    WHILE @i < 15
    BEGIN
        SET @i = @i + 1
        SET @v = (@t1 + @t2) * @k / @i
        SET @f = ASCII(SUBSTRING(@w, 1, 1))
        SET @w = SUBSTRING(@w, 2, 15)
        SET @j = ((@f * @k) + @t1 + (@t2 * @f)) / @i
        SET @v = @v + @j
        IF @v < 33
        BEGIN
            SET @v = @v + (@t1 * @i)
        END
        SET @j = @v % 94
        SET @s = @s + CHAR(33 + @j)
    END
    RETURN @s
END
