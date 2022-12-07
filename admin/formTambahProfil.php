<?php

$formTambah = '
        <div class="card w-100" id="tambahForm">
        <div class="card-header">
        <div class="row">
        <div class="col-md-6">
        <h3 class="card-title mt-2">
        <i class="fa-solid fa-pen-to-square"></i> Tambah Data Kuisioner
        </h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
        <button class="btn bg-secondary float-end" id="kembali">
        <i class="fa-solid fa-arrow-left"></i> Kembali
        </button>
        </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="namaPetugas">Nama Petugas</label>
        <input type="text" class="form-control" id="namaPetugas" placeholder="Nama Petugas" />
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" placeholder="Tanggal" />
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="lokasiBudidaya">Lokasi Budidaya</label>
        <select class="form-control" id="lokasiBudidaya">
        <option value="Taar">Taar</option>
        <option value="Mangon">Mangon</option>
        <option value="Lebetawi">Lebetawi</option>
        <option value="ohoitel">ohoitel</option>
        <option value="Yamtel">Yamtel</option>
        <option value="Dullah">Dullah</option>
        </select>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="namaPembudidaya">Nama Pembudidaya</label>
        <select class="form-control" id="namaPembudidaya">
        <option value="Abdul">Abdul</option>
        </select>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="jenisTeripang">Jenis Teripang</label>
        <select class="form-control" id="jenisTeripang">
        <option value="Gamat">Gamat</option>
        <option value="Pasir">Pasir</option>
        <option value="Nanas">Nanas</option>
        <option value="Bola">Bola</option>
        <option value="Susu">Susu</option>
        <option value="Lotong">Lotong</option>
        </select>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="volumeProduksi">Volume Produksi</label>
        <input type="text" class="form-control" id="volumeProduksi" placeholder="Volume Produksi" />
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="satuanVolume">Satuan Volume</label>
        <select class="form-control" id="satuanVolume">
        <option value="Kg">Kg</option>
        <option value="Ekor">Ekor</option>
        </select>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="harga">Harga Jual</label>
        <input type="text" class="form-control" id="harga" placeholder="Harga Jual" />
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="stok">Stok Tersedia</label>
        <input type="text" class="form-control" id="stok" placeholder="Stok Tersedia" />
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <select class="form-control" id="keterangan">
        <option value="basah">basah</option>
        <option value="kering">kering</option>
        <option value="benih">benih</option>
        <option value="farmasi">farmasi</option>
        </select>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="triwulan">Triwulan</label>
        <select class="form-control" id="triwulan">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </select>
        </div>
        </div>
        </div>
        <div class="row w-100">
        <div class="col-md-12">
        <label>Produksi</label>
        <div class="card">
        <div class="card-body">
        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
        <label for="triwulan">Triwulan</label>
        <select class="form-control" id="triwulan">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </select>
        </div>
        </div>
        </div>
        <div class="card collapsed-card">
        <div class="card-header">
        <div class="card-title">
        Basah
        </div>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div class="card collapsed-card">
        <div class="card-header">
        <div class="card-title">
        Stok Tersedia
        </div>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
        <label for="basahP">Teripang Pasir</label>
        <input type="number" class="form-control" id="basahP" placeholder="Teripang Pasir" />
        </div>
        </div>
        </div>
        <!-- row -->
        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
        <label for="basahG">Teripang Pasir</label>
        <input type="number" class="form-control" id="basahG" placeholder="Teripang Pasir" />
        </div>
        </div>
        </div>
        <!-- row -->
        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
        <label for="t1P">Teripang Pasir</label>
        <input type="number" class="form-control" id="t1P" placeholder="Teripang Pasir" />
        </div>
        </div>
        </div>
        <!-- row -->
        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
        <label for="t1P">Teripang Pasir</label>
        <input type="number" class="form-control" id="t1P" placeholder="Teripang Pasir" />
        </div>
        </div>
        </div>
        <!-- row -->
        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
        <label for="t1P">Teripang Pasir</label>
        <input type="number" class="form-control" id="t1P" placeholder="Teripang Pasir" />
        </div>
        </div>
        </div>
        <!-- row -->
        </div>
        </div>
        <!-- collapsed-card stok -->
        <div class="card collapsed-card">
        <div class="card-header">
        <div class="card-title">
        Sudah Terjual
        </div>
        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        </div>
        </div>
        <div class="card-body">
        <div class="row">
        <div class="col-md-12">
        <div class="form-group">
        <label for="t1P">Teripang Pasir</label>
        <input type="number" class="form-control" id="t1P" placeholder="Teripang Pasir" />
        </div>
        </div>
        </div>
        <!-- row -->
        </div>
        </div>
        <!-- collapsed-card sudah terjual -->
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-2" id="simpan">
        <i class="fa-solid fa-floppy-disk"></i> Simpan
        </button>
        <button type="reset" onclick="reset()" class="btn btn-primary">
        <i class="fa-solid fa-arrows-rotate"></i> Reset
        </button>
        </div>
        </div>";
'

?>