//Classes

class Despesa {
    constructor(ano, mes, dia, tipo, descricao, valor) {
        this.ano = ano;
        this.mes = mes;
        this.dia = dia;
        this.tipo = tipo;
        this.descricao = descricao;
        this.valor = valor;
    }

    validarDados() {
        for (let i in this)
            if (this[i] == undefined || this[i] == null || this[i] == '') return false;
        return true;
    }
}

class BD {
    constructor() {
        if (localStorage.getItem('id') === null) localStorage.setItem('id', 0);
    }

    getNextId() {
        return (+(localStorage.getItem('id'))) + 1;
    }

    gravar(d) {
        let id = this.getNextId();
        localStorage.setItem(id, JSON.stringify(d));
        localStorage.setItem('id', id);
    }

    getRegisters() {
        let despesas = [],
            id = localStorage.getItem('id');
        for (let i = 1; i <= id; i++)
            if (JSON.parse(localStorage.getItem(i)) != null) {
                despesas.push({ id: i, ...JSON.parse(localStorage.getItem(i)) })
            }
        return despesas;
    }

    search(d) {
        let despesas = this.getRegisters();
        if (d.ano != '') despesas = despesas.filter(obj => obj.ano == d.ano)
        if (d.mes != '') despesas = despesas.filter(obj => obj.mes == d.mes)
        if (d.dia != '') despesas = despesas.filter(obj => obj.dia == d.dia)
        if (d.tipo != '') despesas = despesas.filter(obj => obj.tipo == d.tipo)
        if (d.descricao != '') despesas = despesas.filter(obj => obj.descricao == d.descricao)
        if (d.valor != '') despesas = despesas.filter(obj => obj.valor == d.valor)
        return despesas;
    }

    remove(id) {
        localStorage.removeItem(id);
    }
}

let bd = new BD();

//Functions

const cadastrarDespesa = () => {
    const ano = document.getElementById('ano').value;
    const mes = document.getElementById('mes').value;
    const dia = document.getElementById('dia').value;
    const tipo = document.getElementById('tipo').value;
    const descricao = document.getElementById('descricao').value;
    const valor = document.getElementById('valor').value;

    let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor);

    if (despesa.validarDados()) {
        bd.gravar(despesa);
        openModal('text-success', 'Registro inserido com sucesso!', 'Despesa foi cadastrada com sucesso!', 'btn-success', 'Voltar');
        document.getElementById('ano').value = "";
        document.getElementById('mes').value = "";
        document.getElementById('dia').value = "";
        document.getElementById('tipo').value = "";
        document.getElementById('descricao').value = "";
        document.getElementById('valor').value = "";
    } else openModal('text-danger', 'Erro na gravação!', 'Existem campos obrigatórios que não foram preenchidos!', 'btn-danger', 'Voltar e corrigir');
};

const openModal = (titleClass, title, body, btnClass, value) => {
    $('.modal-header').addClass(titleClass);
    $('h5.modal-tile').html(title);
    $('.modal-body').html(body);
    $('.modal-footer button').addClass(btnClass).html(value);
    $('#modalRegister').modal('show');
};

const loadDespesas = () => { renderDespesas(bd.getRegisters()); };

const searchD = () => {
    let ano = document.getElementById('ano').value,
        mes = document.getElementById('mes').value,
        dia = document.getElementById('dia').value,
        tipo = document.getElementById('tipo').value,
        descricao = document.getElementById('descricao').value,
        valor = document.getElementById('valor').value;

    let despesa = new Despesa(ano, mes, dia, tipo, descricao, valor);
    renderDespesas(db.search(despesa));
};

const renderDespesas = (despesas) => {
    let tbody = document.getElementById('tbody');
    tbody.innerHTML = '';

    despesas.forEach(d => {
        let { dia, mes, ano, tipo, descricao, valor } = d;
        let linha = tbody.insertRow();

        switch (+tipo) {
            case 1:
                tipo = 'Alimentação';
                break;
            case 2:
                tipo = 'Educação';
                break;
            case 3:
                tipo = 'Lazer';
                break;
            case 4:
                tipo = 'Saúde';
                break;
            case 5:
                tipo = 'Transporte';
                break;
        }

        linha.insertCell(0).append(`${dia}/${mes}/${ano}`);
        linha.insertCell(1).append(tipo);
        linha.insertCell(2).append(descricao);
        linha.insertCell(3).append(`R$${valor}`);

        let btn = document.createElement('button')
        btn.className = 'btn btn-danger';
        btn.innerHTML = '<i class="fas fa-times"></i>';
        btn.id = d.id;
        btn.onclick = () => {
            bd.remove(this.id);
            window.location.reload();
        };
        linha.insertCell(4).append(btn);
    });
};