local php_container = "mh_php"

require'lspconfig'.phpactor.setup{
    cmd = {"docker", "exec", "-i", php_container, "phpactor", "language-server"}
}

local format_cmd = "autocmd FileType php setlocal formatprg=docker exec -i " .. php_container .. " phpcs --"

-- Pass the string to vim.cmd
vim.cmd(format_cmd)