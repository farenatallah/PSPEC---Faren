#include <stdio.h>

/* PSPEC 1.2: Hitung Total Belanja */
float hitungTotalBelanja(float harga[], int jumlah[], int n) {
    float total = 0, diskon = 0;

    for (int i = 0; i < n; i++) {
        total += harga[i] * jumlah[i];
    }

    if (total > 100000) diskon = 0.10;

    return total - (total * diskon);
}

int main() {
    int n;
    printf("Jumlah item: ");
    scanf("%d", &n);

    float harga[n];
    int jumlah[n];

    for (int i = 0; i < n; i++) {
        printf("Harga item %d: ", i + 1);
        scanf("%f", &harga[i]);
        printf("Jumlah item %d: ", i + 1);
        scanf("%d", &jumlah[i]);
    }

    printf("Total bayar: Rp %.2f\n", hitungTotalBelanja(harga, jumlah, n));
    return 0;
}